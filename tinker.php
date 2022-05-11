// <?php

// Workshop Task
// 1) Create a database structure with the tables and associations you want;
// 2) You should be able to demonstrate all three relationship types as an examples (one to one, one to many, many to many)
// 3) You should have a separate custom pivot table for your relationships
// 4) You should be saving related objects via attach() or sync() methods
// 5) You should demonstrate the polymorphic relationship example
// 6) You should demonstrate eager loading of related records

$user = \App\Models\User::find(1);

$user->roles()->sync([1,2,3]);
