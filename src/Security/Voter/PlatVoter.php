<?php

namespace App\Security\Voter;

use App\Entity\Plat;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use symfony\Component\Security\Core\Authorization\Voter\Voter;
use symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class PlatVoter extends Voter
{
    const EDIT = 'PLAT_EDIT';
    const DELETE = 'PLAT_DELETE';

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports(string $attribute, $plat): bool
    {
        if (!in_array($attribute, [self::EDIT, self::DELETE])) {
            return false;
        }
        if (!$plat instanceof Plat) {
            return false;
        }
        return true;

        //return in_array($attribute, [self::EDIT, self::DELETE]) && $plat instanceof Plat;
    }

    protected function voteOnAttribute(
        $attribute,
        $plat,
        TokenInterface $token
    ): bool {
        // On récupèrel'utilisateur grâce au token
        $user = $token->getUser();

        if (!$user instanceof UserInterface) {
            return false;
        }

        //vérification si l'utilisateur est admin(istrateur)
        if ($this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }

        //On vérifie les permissions et si l'utilisateur peut éditer
        switch ($attribute) {
            case self::EDIT:
                return $this->canEdit();
                break;
            case self::DELETE:
                return $this->canDelete();
                break;
        }
    }

    private function canEdit()
    {
        return $this->security->isGranted('ROLE_ADMIN');
    }
    private function canDelete()
    {
        return $this->security->isGranted('ROLE_ADMIN');
    }
}
