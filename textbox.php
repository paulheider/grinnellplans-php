<?
session_start();
require("functions-main.php");//load main functions
$dbh = db_connect();//establish the database handler

$idcookie = $_SESSION['userid']; 
$auth = $_SESSION['is_logged_in'];

if ( ! $auth) 
{
  gdisp_begin($dbh);//begin guest display
  echo("You are not allowed to edit as a guest.");//tell person they can't log in
  gdisp_end();}//end guest display
else //elseallowed to edit
{
  mdisp_begin($dbh,$idcookie,$HTTP_HOST . $REQUEST_URI,$myprivl);//begin user display
  if ($part)//if form has been submitted
    {
      if ($cols > 150 or $cols < 25)//check to make sure that columns are a reasonable size
        {$message = "Column size is not valid.";}//if not complain
      else //if ok, check the row size
        {
          if ($rows < 5 or $rows > 50)//make sure row size is reasonable
            {$message = "Row size was not valid.";}//if not complain
          else //otherwise sizes are fine, so set the data
            {
              set_item($dbh, "accounts", "edit_cols", $cols,
                       "userid", $idcookie);//update the column size
              set_item($dbh, "accounts", "edit_rows", $rows,         
                       "userid", $idcookie); //update the row size
				if ($notes_asc != 1) {
				$notes_asc = 0;
}
              set_item($dbh, "accounts", "notes_asc", $notes_asc,         
                       "userid", $idcookie); //update the row size
              $message = "Row size set to <b>" . $rows . "</b>." . 
					" <br>Column size set to <b>" . $cols . "</b>.";
            }//if rows else
          
        }//if cols else
      
      //actually tell the user here if there was a problem, or if things were set correctly.
          ?>
          <center><h2>Change Edit Box Size:</h2>
             <?=$message?>
             </center>
             <?
             }
  else //if form hasn't been submitted, get the current column and row size, and give form
    {
      $edsizes = get_items($dbh,"edit_cols, edit_rows, notes_asc","accounts","userid", $idcookie);//gets the columns and row size
      
      //gives form
        ?>
         <center><h2>Change Edit Box Size:</h2>
            <form action="textbox.php" method="GET">
            <table>
            <input type="hidden" name="part" value="1">
            <tr><td>Rows:</td><td><input type="text" name="rows" 
            value="<?=$edsizes[0][1]?>"></td></tr>
            <tr><td>Columns:</td><td><input type="text" name="cols" 
            value="<?=$edsizes[0][0]?>"></tr>
            <tr><td>Notes Posts in ascending order:</td><td><input type="checkbox" name="notes_asc" 
            <? if ($edsizes[0][2] == "1") echo 'checked' ?> value="1"></tr>
            <tr><td></td><td>
            <input type="hidden" name="myprivl" value="<?=$myprivl?>"> 
            <input type="submit" value="Change Edit Box"></td></tr>
            </table>
            </form>
            </center>
            <?            
            }
  mdisp_end($dbh,$idcookie,$HTTP_HOST . $REQUEST_URI,$myprivl);//gets user display
}
db_disconnect($dbh);

?>
