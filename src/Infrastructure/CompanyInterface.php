<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 18:32
 */

namespace HotelApp\Infrastructure;


use HotelApp\Domain\Model\Company;

interface CompanyInterface
{
    public function load(string $id):?Company;

    public function save(Company $company): void;
}