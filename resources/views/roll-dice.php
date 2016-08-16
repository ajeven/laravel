<!DOCTYPE html>
<html lang="en">
<head>
    <title>My First View</title>
</head>
<body>
    <h1>Dice roll was, <?php echo $number; ?>!</h1>
    <h1>You guessed, <?php echo $guess; ?>!</h1>
    <div>
        <?php if ($guess == $number) { ?>
            <?php echo "Great Guess!!" ?>
        <?php } else { ?>
            <?php echo "Guess again my friend" ?>
        <?php } ?>
    </div>
</body>
</html>