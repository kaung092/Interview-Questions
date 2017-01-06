5. Setup an HTML page with a header, navigation bar, content section and footer
	- In the header, center the words "Number Test"
	- In the navigation bar, have links to Google.com, Bisnow.com
	- In the footer on the left, place the words "Bisnow Media 2016"
	- In the footer on the right, place your name
	
5a. In the content section, create a form with 1 input field and a submit field
5b. In the input field, a user will enter a number between 1-1000. The form, using jQuery/AJAX should query a separate PHP file which does the following:
- Validate the user input
- If input is a multiple of three, return “Bisnow”
- If input is a multiple of five, return “Media”
- If input is a multiple of three and five, return “Bisnow Media“
- Save the user’s input to a MySQL tracking table

5c. When a user submits the form, the submit button should show a loading graphic. Users cannot submit the form again if input is valid.
5d. If input is not a number or outside the range, show an error on the form
5e. If the number is in the range, append the result from step 3 to the beginning of the form


--------
