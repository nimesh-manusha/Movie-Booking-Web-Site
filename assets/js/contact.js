function validateForm() {

    //validate email
    let email = document.getElementById("email").value;
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (email === "") {
        alert("Please enter your email.");
        return false;
    } else if (!email.match(emailPattern)) {
        alert("Invalid email address. ");
        return false;
    }

     // Check phone number
   let phone = document.getElementById("phone").value;
   const phonePattern = /^\+94[0-9]{9}$/;
   let msg = document.getElementById('msg');
   
   if (!phone.match(phonePattern)) {
       msg.innerHTML = "Invalid Phone Number.";
       msg.style.color = 'red';
       document.getElementById('phone').focus();
       document.getElementById('phone').select();
       return false;
   } else {
       msg.innerHTML = "Valid Phone Number.";
       msg.style.color = 'green';
   }
   
   

   alert("message send successfully ");
   return true;
}
