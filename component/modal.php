<?php
    $formArray = explode(',',$_GET['modal']);
    $pid = $_GET['id'];
?>
<div class="modal">
    <head>
        <link rel="stylesheet" href="../css/customer.css">
    </head>
    <form action="editProduct.php" method="POST" class="modalForm">
        <input type="hidden" name="pid" value='<?php echo $pid; ?>'>
        <input type="text" name="productName" placeholder="product name" value='<?php echo $formArray[3]; ?>' required>
        <input type="number" name="amount" placeholder="amount" value='<?php echo $formArray[4]; ?>' required>
        <input type="number" name="price" placeholder="price" value='<?php echo $formArray[5]; ?>' required>
        <label for="appointmentDate">appointment date</label>
        <input type="date" name="appointmentDate" id="appointmentDate" value='<?php echo $formArray[6]; ?>' required>
        <input type="text" name="location" placeholder="location" value='<?php echo $formArray[8]; ?>' required>
        <textarea name="comment" placeholder="comment here" required><?php echo $formArray[9]; ?></textarea>
        <input type="submit" value="edit">
        <a href="<?php echo " ".$_SERVER['PHP_SELF']."?msg=msg"?>">cancel editting</a>
        <a href="<?php echo "./editProduct.php?pid=$pid"?>">delete</a>
    </form> 
</div>
