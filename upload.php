<?php
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 5*1000000)
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
    echo "Uploading: " . $_FILES["file"]["name"] . "<br>";
    if (file_exists("img/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "img/" . $_FILES["file"]["name"]);
      echo "Upload Sucessful! Paste the below code into your blog entry: <br>";
      echo '<p><b>![' , $_FILES["file"]["name"], ']({{ site.baseurl }}/' , 'img/' , $_FILES["file"]["name"] , ')</b></p>';
      $name = $_FILES["file"]["name"];
	  $result = `sudo sh copyimages.sh $name`;
    }
  }
} else {
  echo "Invalid file";
}
