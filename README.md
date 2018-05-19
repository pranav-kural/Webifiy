# Webifiy
The Ultimate directory of some of the most amazing e-commerce stores. It's a list of awesome online stores and businesses with beautiful websites and an exceptional business model.

### Purpose
Webifiy was created as an academic project, the requirements for which were to practice CRUD (Create, Read, Update and Delete) using php. Official requirements for the project were:

   1. Demonstrate the first two parts of CRUD
       CREATE
       READ
   2. Demonstrate the understanding of one-to-many relationship in an application environment
   3. Demonstrate validating and sanitizing user input
   4. Demonstrate working with POST and GET HTTP methods

### Development goals

   1. CREATE
      1. A form for collecting user input for the parent table
        1. Must contain 3+ HTML form elements to represent the 3+ data columns in the database
        2. The elements must be the most practical elements for the type of data you are collecting
      2. A form for collecting user input for the child table
        1. Must contain 1 dropdown column populated with data from the parent table
        2. Must contain the ID as the value, and the name as the label
        3. Must contain 2+ HTML form elements for the remaining 2+ data columns in the database
      3. The form must contain the two attributes action and method
      4. Both forms require a php page for processing the form and inserting the data into the database
      5. Each processing page must abide by the following:
        1. A working connection to the database
        2. Binded parameters (bindParam)
        3. A redirect to either a confirmation page, or to another page that contains either an error message or a success message

   2. READ
      1. An HTML page containing an HTML table for the parent table data
        1. The table must have a header row labelling each column
        2. It is required that a php script be used to select all the rows of data from the parent table in the database
        3. A foreach loop is required to loop through the rows and output them within the HTML table
        4. Each parent row must contain a link to its child data
      2. A linked HTML page, from the parent HTML table, that shows the following:
        1. A section showing each column entry from the selected parent table row
        2. It is required that a php script be used to select all the rows of data from the parent table in the database using the parent table id as a condition
        3. An HTML table containing a header row with the child table column labels
        4. A foreach loop is required to loop through the rows and output them within the HTML table
        
   3. Validation and Sanitization of data
      1. Must have client-side validation for both the new_parent.php page and the new_child.php page (May use HTML 5 validation or JavaScript validation (such as Parsley JS))
      2. Must have server-side validation
      3. Must validate against empty for required fields
      4. Must sanitize strings to avoid the injection of client-side scripting
      5. Must validate the data format of URLs, emails, telephone numbers, or any other required formats
      6. Must send the user to an error page or back to the form with a session message if the form hasn't been filled out properly

   4. Interface
      1. Can utilize Bootstrap, Foundation, or your own custom UI CSS so your page is organized and styled

#### Project link: http://gc200333253.computerstudi.es/webifiy

## Made with 💕 by Pranav Kural
