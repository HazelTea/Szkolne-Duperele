<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $student_count = 50;
        function create_student_grader($student_name) {
            $post_students = isset($_POST['students']);
            $student_value = $post_students ? $_POST['students'][$student_name] : 0;
            ?>
            <tr> 
                <td><label for="<?=$student_name?>"><?=$student_name?></label></td>
                <td><input type="text" name="students[<?=$student_name?>]" id="<?=$student_name?>" maxlength="1" value=<?=$student_value?>></td>
            </tr>
            <?php
        } 
    ?>
    <form method="post" id="main_form">
        <table>
            <caption>Oceny</caption>
            <?php 
                for ($student_number=1; $student_number <= $student_count; $student_number++) { 
                    create_student_grader("Uczeń $student_number");
                }
            ?>
            <tr>
                <td colspan="2"><input type="submit" name="submitter" value="Zapisz"></td>
            </tr>
        </table>
    </form>
</body>
</html>