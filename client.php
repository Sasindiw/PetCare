
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuzz n' Feathers - Inquiries</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../styles/client.css">

    <style>
        .sidebar {
  position: fixed;
  left: 0;
  top: 0;
  width: 200px;
  height: 100%;
  background-color: #333;
  padding-top: 20px;
  margin-top: 6%;
  background-color: rgb(238, 170, 34) ;
}


.sidebar a {
  display: block;
  color: white;
  padding: 10px;
  text-decoration: none;
  margin-bottom: 15%;
  margin-top: 35%;
}


.sidebar a:hover {
  background-color: #061440;
  height: 10%;
}

.content {
  margin-left: 200px; 
  padding: 20px;
}
.sidebar a i {
    margin-right: 10px; 
    font-size: 20px;
}



#about {
    margin-top: 10%;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

#about h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
    text-align: center;
}

#about p {
    font-size: 16px;
    color: #666;
    line-height: 1.6;
    text-align: justify;
}


#images {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

#images .image-container img {
    width: calc(33% - 20px);
    height: auto;
    border: 2px solid #333; 
    margin: 10px; 
}




#why-choose-us {
    background-color: #061440;
    color: #fff;
    padding: 50px 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    text-align: center;
}

.reasons {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.reason {
    flex: 1;
    max-width: 300px;
    margin: 20px;
}

.reason i {
    font-size: 36px;
    margin-bottom: 20px;
}

.reason h3 {
    font-size: 24px;
    margin-bottom: 10px;
}

.reason p {
    font-size: 16px;
    line-height: 1.6;
}



</style>
</head>
<body>

<div class="sidebar">
<a href="../html/services.html"><i class="fas fa-tools"></i> SERVICES</a>
<a href="../html/Appointment.html"><i class="fas fa-calendar-alt"></i> APPOINTMENTS</a>
<a href="../html/contact.html"><i class="fas fa-phone"></i> CONTACT US</a>
<a href="../html/messages.php"><i class="fas fa-envelope"></i> MESSAGES</a>
<a href="../html/signin.html"><i class="fas fa-sign-out-alt"></i> LOG OUT</a>

</div>

<div class="content">
    <header class="header">
        <a href="#" class="logo">
            <i class="fas fa-dog"></i>
            Fuzz n' Feathers
        </a>
        <nav class="navbar">
        <a href="../html/index.html"><i class="fas fa-home"></i> HOME</a>
            <a href="../html/about.html"><i class="fas fa-info-circle"></i> ABOUT</a>
          
           
        </nav>
    </header>

    <section id="about">
    <h2>Fuzz n' Feathers Hospital</h2>
    <br>
    <p>Fuz and Feathers Animal Hospital in Sri Lanka stands as a beacon of compassion and care for all creatures great and small. 
      Nestled amidst the lush greenery of this tropical paradise, the hospital is more than just a veterinary clinic; it's a sanctuary where dedicated professionals work tirelessly to heal, rehabilitate, and protect the furry and feathered inhabitants of the island.

Founded on the principles of kindness and expertise, Fuz and Feathers boasts state-of-the-art facilities and a team of highly skilled veterinarians and support staff. From routine check-ups to complex surgeries, they provide a comprehensive range of medical services tailored to the diverse needs of their patients.

But what truly sets this hospital apart is its unwavering commitment to animal welfare. Beyond the walls of the clinic, Fuz and Feathers actively engages in community outreach and education programs, raising awareness about responsible pet ownership, wildlife conservation, and the importance of spaying and neutering to control the stray animal population.

Every day, countless lives are touched by the compassion and dedication of the team at Fuz and Feathers Animal Hospital. Whether it's a stray kitten in need of a loving home or an injured bird rescued from harm's way, this sanctuary remains a beacon of hope and healing for all creatures in Sri Lanka.</p>
</section>
 <br>

<section id="images">
    <div class="image-container">
        <img src="../images/client image 1.avif" alt="Dog 1">
        <img src="../images/client image 3.webp" alt="Cat 1">
        <img src="../images/client image 2.jpg" alt="Dog 2">
    </div>
</section>
<br>
    
<section id="why-choose-us">
    <div class="container">
        <h2>Why Choose Us?</h2>
        <br>
        <br>
        <div class="reasons">
            <div class="reason">
                <i class="fas fa-heartbeat"></i>
                <h3>Compassionate Care</h3>
                <p>Our team is dedicated to providing compassionate care to all animals, ensuring they receive the love and attention they deserve.</p>
            </div>
            <div class="reason">
                <i class="fas fa-stethoscope"></i>
                <h3>Expertise and Experience</h3>
                <p>With a team of highly skilled veterinarians and support staff, we offer expertise and experience in a wide range of medical services.</p>
            </div>
            <div class="reason">
                <i class="fas fa-hand-holding-heart"></i>
                <h3>Community Outreach</h3>
                <p>We actively engage in community outreach and education programs to promote responsible pet ownership and wildlife conservation.</p>
            </div>
            <div class="reason">
                <i class="fas fa-user-friends"></i>
                <h3>Personalized Approach</h3>
                <p>We believe in a personalized approach to veterinary care, tailoring our services to meet the unique needs of each patient.</p>
            </div>
            <div class="reason">
                <i class="fas fa-hospital"></i>
                <h3>State-of-the-Art Facilities</h3>
                <p>Equipped with state-of-the-art facilities, we ensure the highest standards of care for all our furry and feathered friends.</p>
            </div>
        </div>
    </div>
</section>


</div>
 
</body>
</html>

