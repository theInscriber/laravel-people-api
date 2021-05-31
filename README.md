# Laravel People API
Implemented according to the specifications submitted by Global Protection Code Recruitment Team (Christopher)

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x)

#### Assumption!
You are using Laravel Sail to set up your local development environment

Clone the repository

    git clone git@github.com:theInscriber/laravel-people-api.git

Switch to the repo folder

    cd laravel-people-api

Spin up Docker containers with Sail to start the local development environment

    sail up -d

Install all the dependencies using composer

    sail composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    sail artisan key:generate

Create Symbolic Link to Storage Folder in Public Folder

    sail artisan storage:link

Run the database migrations (**Set the database connection in .env before migrating**)

    sail artisan migrate

You can now access the server at http://localhost

**TL;DR command list**

    git clone git@github.com:theInscriber/laravel-people-api.git
    cd laravel-people-api
    sail up -d
    sail composer install
    cp .env.example .env
    sail artisan key:generate
    sail artisan storage:link

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    sail artisan migrate

## API Specification

> [Full API Spec](https://documenter.getpostman.com/view/1736659/TzY1gbfR)

# Testing API

The api can now be accessed at

    http://localhost/api

Request headers

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| Yes      	| Content-Type     	| application/json 	|
| Yes      	| X-Requested-With 	| XMLHttpRequest   	|

Refer the [api specification](#api-specification) for more info.

----------

# Authentication

This applications uses Predefined API Keys to handle authentication. The API key is passed with each request using the `api_key` query parameter.
