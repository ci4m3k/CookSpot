<?php

class UserDetails {
    private $id_users_details;
    private $id_user;
    private $first_name;
    private $last_name;
    private $city;
    private $street_name;
    private $street_address;
    private $postal_code;
    private $state;
    private $country;

    public function __construct(
        string $id_users_details = null,
        string $id_user = null,
        string $first_name = null,
        string $last_name = null,
        string $city = null,
        string $street_name = null,
        string $street_address = null,
        string $postal_code = null,
        string $state = null,
        string $country = null
    ) {
        $this->id_users_details = $id_users_details;
        $this->id_user = $id_user;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->city = $city;
        $this->street_name = $street_name;
        $this->street_address = $street_address;
        $this->postal_code = $postal_code;
        $this->state = $state;
        $this->country = $country;
    }

    public function getIdUsersDetails(): string {
        return $this->id_users_details;
    }

    public function setIdUsersDetails(string $id_users_details): void {
        $this->id_users_details = $id_users_details;
    }

    public function getIdUser(): string {
        return $this->id_user;
    }

    public function setIdUser(string $id_user): void {
        $this->id_user = $id_user;
    }

    public function getFirstName(): ?string {
        return $this->first_name;
    }

    public function setFirstName(?string $first_name): void {
        $this->first_name = $first_name;
    }

    public function getLastName(): ?string {
        return $this->last_name;
    }

    public function setLastName(?string $last_name): void {
        $this->last_name = $last_name;
    }

    public function getCity(): ?string {
        return $this->city;
    }

    public function setCity(?string $city): void {
        $this->city = $city;
    }

    public function getStreetName(): ?string {
        return $this->street_name;
    }

    public function setStreetName(?string $street_name): void {
        $this->street_name = $street_name;
    }

    public function getStreetAddress(): ?string {
        return $this->street_address;
    }

    public function setStreetAddress(?string $street_address): void {
        $this->street_address = $street_address;
    }

    public function getPostalCode(): ?string {
        return $this->postal_code;
    }

    public function setPostalCode(?string $postal_code): void {
        $this->postal_code = $postal_code;
    }

    public function getState(): ?string {
        return $this->state;
    }

    public function setState(?string $state): void {
        $this->state = $state;
    }

    public function getCountry(): ?string {
        return $this->country;
    }

    public function setCountry(?string $country): void {
        $this->country = $country;
    }
}

?>
