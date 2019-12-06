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
You can use either **tree** or **star**, the size could me **S**, **M** or **L**.  
The **--size** parameter is optional, if it is not specified, it will be selected randomly.
- try to write a shape, that doesn't exist, for example  
`php bin/console xmas bell`
- try to write a size, that doesn't exist  
`php bin/console xmas tree --size=XXL`

### Testing the browser part
- open your browser and go to  
`http://127.0.0.1:8000/xmas/tree/L`  
You can use either **tree** or **star**, the size could me **S**, **M** or **L**.  
The last parameter (size) is optional, if it is not specified, it will be selected randomly.
- try to write a shape, that doesn't exist, for example  
`http://127.0.0.1:8000/xmas/bell`
- try to write a size, that doesn't exist  
`http://127.0.0.1:8000/xmas/tree/XXL`

### Run unit tests
`php bin/phpunit`

### Implementation
**Files added**
<pre>
root
├── src  
│   ├── Command  
│   │   └── XmasCommand.php  
│   ├── Controller
│   │   └── XmasController.php
│   ├── Helper
│   │   ├── ShapeBuilder.php
│   │   └── ShapeDrawer.php
│   └── Shapes
│       ├── Pattern.php
│       ├── Shape.php
│       ├── StarPattern.php
│       └── TreePattern.php
├── templates
│   ├── xmas
│   │   └── shape.html.twig
│   └── base.html.twig
└── tests
    ├── Command
    │   └── XmasCommandTest.php
    ├── Controller
    │   └── XmasControllerTest.php
    └── Helper
        ├── ShapeBuilderTest.php
        └── ShapeDrawerTest.php
</pre>

**Description**  
First, I created **StarPattern** and **TreePattern** classes, which implements the **Pattern** interface, and have only 
one function `get()` that retrieves the pattern.  

I also created a class **Shape**, that has pattern and size properties and use `getPattern()` function.  
Two helpers, **ShapeBuilder** and **ShapeDrawer** have the business logic, which is used in both console and browser 
parts of the application. In **ShapeBuilder**, I initialize the shape by retrieving a pattern and specifying the size.
In **ShapeDrawer**, in the `draw()` function, I am building a drawing as an array, in which each value is a line of the 
shape.  

Now, for a console part of the application, I created a **XmasCommand**, that configures the new CLI command `xmas` with 
attribute `name` and optional parameter `size`. In `execute()` action I am getting the specified attribute and an 
optional parameter and pass them to init and draw the shape using **ShapeBuilder** and **ShapeDrawer**.    

Finally, for a browser part of the application, I created a **XmasController**, that has `getXmasShape()` function with
a route in the annotation, which should be in the format `/xmas/name/size`. I pass the parameters `name` and `size` to 
init and get the drawing of the shape using **ShapeBuilder** and **ShapeDrawer**. The drawing I later render into a 
`xmas/shape.html.twig` view.    

In addition, I have added unit and functional tests under `tests/` folder. 

### Author and tools
**Author**: Dennis Peld  
**Language & Framework**: PHP 7.4, Symfony 5  
**Server**: Homestead (Vagrant)  
**Environment**: JetBrains PHPStorm 2019.3