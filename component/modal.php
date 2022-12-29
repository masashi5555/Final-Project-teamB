<?php
    $formArray = explode(',',$_GET['modal']);
    $pid = $_GET['id'];
    echo "<p id='red'>dfafadfasf</p>";
?>
<div class="modal">
    <style>
        .modal {
            width: 30%;
            position: fixed;
            z-index:10;
            left: 50%;
            bottom: 0%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .modalForm {
            width: 100%;
        }

        .buttons {
            display: flex;
        }

        .edit,
            [type="submit"] {
            display: flex;
            width: 45%;
            background-color: gainsboro;
        }

        .delete {
            color: red;
        }

        #red {
            background-color: red;
        }
    </style>
    <!-- <head>
        <link rel="stylesheet" href="../css/modal.css">
    </head> -->
    <form action="editProduct.php" method="POST" class="modalForm">
        <input type="hidden" name="pid" value='<?php echo $pid; ?>'>
        <input type="text" name="productName" placeholder="product name" value='<?php echo $formArray[3]; ?>' required>
        <input type="number" name="amount" placeholder="amount" value='<?php echo $formArray[4]; ?>' required>
        <input type="number" name="price" placeholder="price" value='<?php echo $formArray[5]; ?>' required>
        <label for="appointmentDate">appointment date</label>
        <input type="date" name="appointmentDate" id="appointmentDate" value='<?php echo $formArray[6]; ?>' required>
        <input type="text" name="location" placeholder="location" value='<?php echo $formArray[8]; ?>' required>
        <textarea name="comment" placeholder="comment here" required><?php echo $formArray[9]; ?></textarea>
        <div class="buttons">
            <input type="submit" value="edit">
            <a href="<?php echo " ".$_SERVER['PHP_SELF']."?msg=msg"?>" class="edit">cancel editting</a>
        </div>
        <a href="<?php echo "./editProduct.php?pid=$pid"?>" class="delete">delete</a>
    </form> 
</div>
