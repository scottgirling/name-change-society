Name Change Society Prototype Application
=========================================

Project Summary
---------------

I've been given the honour to build a name changing platform for the citizens of
the glorious nation of Namechangia.

This repository does not contain the full application; it contains prototype
code, which can be used demonstrate to our leaders—those who govern
Namechangia—what is possible for a name changing platform.

Project Plan
------------

To satisfy a number of requirements, the project plan has been plotted below, so
that our leaders can have a clear idea where the project is and where it is going.

**REST Framework**

A basic REST framework will be implemented to allow safe and easy access to
backend data from any authenticated frontend framework.

**Endpoints**

A number of endpoints need to be implemented for the name change application to
function.

- Authentication `POST /login`

A username and password can be posted to this endpoint. The backend will check
the username and password, and if they are correct, the session will be
authenticated and the user can proceed.

*Please Note: Passwords will be hashed in the backend and stored as such. We
value the security of the citizens of Namechangia!*

- Names `GET /names`, `GET /names/:id`, `POST /names`

This endpoint will retrieve historical names `GET /names` for a user, `GET
/names/:id` get names for a specific user (admin only), `POST /names`, which
is used to change names of the current user, and `POST /names/:id` to change the
name of another user (admin only).

*Please note: Although we use the term "change" to describe what's happening
when a citizen changes their name, in the database, we're adding a new name, not
changing it. This is why we're using POST and not PUT.*

**Frontend**

For the purposes of this prototype, the frontend will be basic HTML with some
basic JavaScript behind the scenes, conducting negotiations with the REST
framework.

**Backend**

The application layer will be written in PHP, and the relational database is
MySQL.

Beyond The Prototype
--------------------

If this prototype is approved, I will pull together a team and more thoroughly
scope out the project, choosing battle-tested frameworks in place of the custom
ones which have been built for the prototype.

How To Use
----------

**Requirements**

- Docker
- docker-compose

**Running**

1. Clone this repository
2. `cd` into it
3. Run `docker-compose up`
4. Open your favourite web browser and navigate to `127.0.0.1:8080`
5. Log in using `a@a.com` as the email and `ilovenames!` as the password
