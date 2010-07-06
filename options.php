<div class="updated fade">Thanks for using this plugin, if you feel satisfied, please make a <a href="http://mr.hokya.com/donate" target="_blank">donation</a></div>

<?php
if ($_POST["action"]=="add") {
	$option = get_option("meta");
	$option .= $_POST["name"]."===".$_POST["value"].";;;";
	update_option("meta",$option);
	echo '<div class="updated fade">New Meta Tag Registered !</div>';
}
if ($_POST["action"]=="remove") {
	$option = explode(";;;",get_option("meta"));
	$new = array();
	for ($i=0;$i<count($option);$i++) {
		$meta = explode("===",$option[$i]);
		if ($meta[0]<>$_POST["delete"]) array_push($new,$option[$i]);
	}
	$option = join(";;;",$new);
	update_option("meta",$option);
	echo '<div class="updated fade">Meta Tag Removed !</div>';
}
?>
<div class="wrap">
<?php if(function_exists('screen_icon')) screen_icon(); ?>
<h2>Easy Meta</h2>
<em>You can easily add, remove, or edit any of your meta tag information here. For example for claiming your blog by put some meta tag information. It will save time for claiming purpose and you don't need to recode for tag verification everytime you change the wordpress Theme &raquo; <a href="http://mr.hokya.com/easy-meta/" target="_blank">Further documentation</a>
<style>
tr {background-color:#FFF;}
tr:hover {background-color:#FF9;}
td, th {padding:5px;}
th {background-color:#6F0;}
.isian {padding:3px; border:solid 1px #6F0;}
.isian:hover {background-color:#FFC;}
</style>
<table>
<tr>
<th>Meta Name</th>
<th>Meta Value</th>
<th>Action</th>
</tr>
<?php
$data = get_option("meta");
$metas = explode(";;;",$data);
for ($i=0;$i<count($metas)-1;$i++) {
	$meta = explode("===",$metas[$i]);
	echo "<form method='POST'>";
	echo "<input type='hidden' name='delete' value='".$meta[0]."' />";
	echo "<input type='hidden' name='action' value='remove' />";
	echo "<tr>";
	echo "<td>".$meta[0]."</td>";
	echo "<td>".$meta[1]."</td>";
	echo "<td><input class='button' type='submit' value='Delete'/></td>";
	echo "</tr>";
	echo "</form>";
}
?>
</table>

<h3>Add New Meta Tag Record</h3>
<form method="post">
<input type="hidden" name="action" value="add" />
<p>Meta Tag Name  :<input class="isian" name="name" /></p>
<p>Meta Tag Value :<input class="isian" name="value" /></p>
<p><input type="submit" class="button-primary" value="Add New" /></p>
</form>

</div>