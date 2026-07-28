function myFunction() {
    let text = "Are you sure you want to delete this <?php echo $row['ISBN']; ?>?";
    if (confirm(text) == true) {
        text = "You pressed OK!";
    } else {
        text = "You canceled!";
    }
    document.getElementById("dltBtn").innerHTML = text;
}