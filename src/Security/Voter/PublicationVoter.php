<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class PublicationVoter extends Voter
{
    protected function supports($attribute, $subject)
    {
        return in_array($attribute, ['PUBLICATION_EDITER'])
            && $subject instanceof \App\Entity\Publication;
    }

    /**
     * @param string $attribute
     * @param \App\Entity\Publication $subject
     * @param \Symfony\Component\Security\Core\Authentication\Token\TokenInterface $token
     *
     * @return bool
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        switch ($attribute) {
            case 'PUBLICATION_EDITER':
                return $subject->getEcritPar()->getUtilisateur() == $user;
        }

        return false;
    }
}
