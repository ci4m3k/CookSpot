<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/UserDetails.php';

class UserDetailsRepository extends Repository
{

    public function getUserDetails(string $id_user): ?UserDetails
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users_details WHERE id_user = :id_user
        ');
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $stmt->execute();

        $users_details = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($users_details == false) {
            return null;
        }

        return new UserDetails(
            $users_details['id_users_details'],
            $users_details['id_user'],
            $users_details['first_name'],
            $users_details['last_name'],
            $users_details['city'],
            $users_details['street_name'],
            $users_details['street_address'],
            $users_details['postal_code'],
            $users_details['state'],
            $users_details['country']
         
        );
    }

    public function addUserDetails(UserDetails $users_details)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_details (
            id_users_details,
            id_user,
            first_name,
            last_name,
            city,
            street_name,
            street_address,
            postal_code,
            state,
            country
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $users_details->getIdUsersDetails(),
            $users_details->getIdUser(),
            $users_details->getFirstName(),
            $users_details->getLastName(),
            $users_details->getCity(),
            $users_details->getStreetName(),
            $users_details->getStreetAddress(),
            $users_details->getPostalCode(),
            $users_details->getState(),
            $users_details->getCountry()
                     
        ]);
    }

    public function isUserHasDetails(string $id_user) :bool 
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.users_details WHERE id_user = :id_user
        ');

        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $stmt->execute();

        $users_details = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($users_details == false) {
            return false;
        }
        return true;
    }


    

    public function updateUserDetails(UserDetails $details, string $user_id)
    {
        $stmt = $this->database->connect()->prepare('
            UPDATE public.users_details
            SET
                first_name = ?,
                last_name = ?,
                city = ?,
                street_name = ?,
                street_address = ?,
                postal_code = ?,
                state = ?,
                country = ?
            WHERE
                id_user = ?
        ');

        $stmt->execute([
            $details->getFirstName(),
            $details->getLastName(),
            $details->getCity(),
            $details->getStreetName(),
            $details->getStreetAddress(),
            $details->getPostalCode(),
            $details->getState(),
            $details->getCountry(),
            $user_id
        ]);
    }

    public function updateUsername(string $user_id, string $new_username)
    {
        $stmt = $this->database->connect()->prepare('
            UPDATE public.users
            SET
                username = ?,
            WHERE
                id_user = ?
        ');

        $stmt->execute([
            $new_username,
            $user_id
        ]);
    }


}