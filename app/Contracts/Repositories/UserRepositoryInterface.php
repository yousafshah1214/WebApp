<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 20/4/2016
 * Time: 10:11 PM
 */

namespace App\Contracts\Repositories;


use App\Contracts\Models\UserProfileModelInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Create Database Entity with given columns to User Table
     *
     * @param array $columns
     * @param $type
     * @return mixed
     */
    public function create(array $columns, $type);

    /**
     * Return collection of User Model with only given columns
     *
     * @param array $columns
     * @return mixed
     */
    public function getByColumn(array $columns);

    /**
     * Return Currently Inserted User Id
     *
     * @return mixed
     */
    public function getInsertedUserId();

    /**
     * Return User with given Id else return null
     *
     * @param int $id
     * @return mixed
     */
    public function getUser(int $id);

    /**
     * Attachs given profile model to User Model
     *
     * @param UserProfileModelInterface $profile
     * @return mixed
     */
    public function attachProfile(UserProfileModelInterface $profile);
}