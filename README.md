# xmas-decor

### User story
As a geeky christmas fan I want to generate ASCII shapes of stars and trees in three different
sizes so that I can decorate my office nicely for christmas.

### Details
The designer has provided the following designs for the shapes:

![Image of Yaktocat](https://github.com/dennispeld/xmas-decor/blob/master/shapes-design.jpg)

The following sizes should be available:
* **S** [mall]: 5 lines height
* **M** [edium]: 7 lines height
* **L** [arge]: 11 lines height

If the user does not provide a size, pick a random size.  
It should be possible to output the shapes both on the command line and in a browser.

### Hints
* Consider that adding new shapes should be possible in the future.
* You don’t have to make the output depend on actual user input. For the sake of this task
having an easy way of faking user input in the code is enough.
* Bonus: Add unit tests

### Setup
- make sure you use the latest version of PHP (7.4)
- composer install
- symfony serve

### Testing the console part
- open your terminal app
- cd to the root of the project
- type the following command:  
`php bin/console xmas tree --size=L`  
You can use either 'tree' or 'star', the size could me S, M or L. 
The --size parameter is optional, if it is not specified, it will be selected randomly.
- try to write a shape, that doesn't exist, for example  
`php bin/console xmas bell`
- try to write a size, that doesn't exist
`php bin/console xmas tree --size=XXL`

### Testing the browser part
- open your browser and go to
`http://127.0.0.1:8000/xmas/tree/L`  
You can use either 'tree' or 'star', the size could me S, M or L.  
The last parameter (size) is optional, if it is not specified, it will be selected randomly.
- try to write a shape, that doesn't exist, for example  
`http://127.0.0.1:8000/xmas/bell`
- try to write a size, that doesn't exist
`http://127.0.0.1:8000/xmas/tree/XXL`

Author: Dennis Peld  
Language & Framework: PHP 7.4, Symfony 5  
Server: Homestead (Vagrant)
Environment: JetBrains PHPStorm 2019.3