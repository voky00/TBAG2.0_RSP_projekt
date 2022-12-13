<?php
// start session if not
if (!isset($_SESSION)) {
    session_start();
}
// get role
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
} else {
    $role = "guest";
}
require("backend.php");
// header
require("templates/header.php");
require("navigation.php");


?>




<table>

	<tr>
		<td class="blok">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Fusce suscipit libero eget elit. Nullam sit amet magna in magna gravida vehicula. Maecenas sollicitudin. In dapibus augue non sapien. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Donec quis nibh at felis congue commodo. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Aliquam erat volutpat. Neque porro quisquam est, qui</td>
		<td class="blok">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Fusce suscipit libero eget elit. Nullam sit amet magna in magna gravida vehicula. Maecenas sollicitudin. In dapibus augue non sapien. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Donec quis nibh at felis congue commodo. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Aliquam erat volutpat. Neque porro quisquam est, qui</td>
	</tr>

<tr>
	<td colspan="2" class="blok">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Fusce suscipit libero eget elit. Nullam sit amet magna in magna gravida vehicula. Maecenas sollicitudin. In dapibus augue non sapien. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Donec quis nibh at felis congue commodo. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Aliquam erat volutpat. Neque porro quisquam est, qui</td>
	</tr>
</tr>

<tr>
	<td rowspan="2" class="blok">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Fusce suscipit libero eget elit. Nullam sit amet magna in magna gravida vehicula. Maecenas sollicitudin. In dapibus augue non sapien. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Donec quis nibh at felis congue commodo. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Aliquam erat volutpat. Neque porro quisquam est, qui</td>
	<td class="blok">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Fusce suscipit libero eget elit. Nullam sit amet magna in magna gravida vehicula. Maecenas sollicitudin. In dapibus augue non sapien. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Donec quis nibh at felis congue commodo. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Aliquam erat volutpat. Neque porro quisquam est, qui</td>
	</tr>

<tr>
	<td class="blok">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Fusce suscipit libero eget elit. Nullam sit amet magna in magna gravida vehicula. Maecenas sollicitudin. In dapibus augue non sapien. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Donec quis nibh at felis congue commodo. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Aliquam erat volutpat. Neque porro quisquam est, qui</td>

	</tr>


</table>


</div>
<?php
include("templates/footer.php");