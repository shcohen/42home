<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Camagru</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../assets/icon.png">
    <link rel="stylesheet" href="../style/index.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../style/terms.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="grid-container" id="grid-container">

    <div class="header" id="header">
                        <h1 style="margin: 0;">CAMAGRU</h1>
    </div>

    <div class="navbar">
        <a class="active" href="../index.php"><i class="fa fa-fw fa-home"></i> HOME</a>
        <a href="#"><i class="fa fa-fw fa-search"></i> SEARCH</a>
        <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> CONTACT</a>
        <a href="login.php"><i class="fa fa-fw fa-user"></i><?php if (!empty($_SESSION['username'])) { echo htmlspecialchars($_SESSION['username']); } else {?> LOGIN<?php }?></a>
    </div>

    <div class="main">
        <div class="boxy">
            <h1 style="font-size:3vw;">PRIVACY & TERMS -- CAMAGRU</h1>
            <h2 style="font-size: 2vw"><i>About Privacy</i></h2>
            <p style="font-size:1vw;"><b>1. Information Collection</b></p>
                <p style="font-size:1vw;">Personally Identifiable Information is information that can be used to contact you or determine your specific identity. When other information is linked to this information, it also becomes Personally Identifiable Information.</p>
                <p style="font-size:1vw;">We may ask you for voluntary personal information at other times, including but not limited to when you provide opinions, enter a contest or promotion, or report a problem with the Service.</p>
                <p style="font-size:1vw;">We may also automatically receive and record information in our server logs from your browser, including your IP address, your computer’s name, the type and version of your web browser, referrer addresses, and other generally-accepted log information. We may also record page views (hit counts) and other general statistical and tracking information.</p>

            <p style="font-size:1vw;"><b>2. Cookies</b></p>
                <p style="font-size:1vw;">A cookie is a small amount of data, which often includes an anonymous unique identifier that is sent to your browser from a web site’s computers and stored on your computer’s hard drive. Each web site can send its own cookies to your browser if your browser’s preferences allow it, but (to protect your privacy) most browsers only permit a web site to access the cookies that the same web site has already sent to you, not the cookies sent to you by other sites.</p>
                <p style="font-size:1vw;">CAMAGRU may set and access our own cookies on your computer. CAMAGRU may use cookies to identify you as a repeat visitor or customer of the website, to maintain session information for logged in users, and to track usage trends and patterns in order to better understand and improve areas of our website.</p>
                <p style="font-size:1vw;">CAMAGRU may also allow other companies that are presenting content on our site to set and access their own cookies on your computer. Other companies’ use of cookies is subject to their own respective privacy policies. We do not have access to any information stored by third party advertisers about you.</p>

            <p style="font-size:1vw;"><b>3. Disclosure of Personally Identifiable Information</b></p>
                <p style="font-size:1vw;">We will not disclose your Personally Identifiable Information to unaffiliated third parties without your express consent except in the under noted circumstances:</p>
                <p style="font-size:1vw;">i) If we believe that the user is harming or interfering with other users of the Service, anyone else, or infringing any of our legal rights.</p>
                <p style="font-size:1vw;">(ii) If we are required by law to provide any of your Personally Identifiable Information we will, if permitted by law, attempt to notify you via the e-mail address you supplied during registration within a reasonable amount of time before we respond to the request.</p>

            <p style="font-size: 1vw;"><b>4. Use and Disclosure of Anonymous Information</b></p>
                <p style="font-size: 1vw;">Anonymous Information is any information other than Personally Identifiable Information, including aggregate information derived from Personally Identifiable Information. Anonymous Information will not include any Personally Identifiable Information and we will not disclose any Personally Identifiable Information except as expressly stated elsewhere in this policy.</p>
                <p style="font-size: 1vw;">We may use this information:</p>
                <p style="font-size: 1vw;">(i) To improve the Service, to monitor traffic and general usage patterns, and for other general business purposes;</p>
                <p style="font-size: 1vw;">(ii) To understand what content is appealing to our readers, to inform advertisers of the usage habits or characteristics of the interested audience, and to advise potential investors so that they may better understand our user base</p>

            <p style="font-size: 1vw;"><b>5. Security</b></p>
                <p style="font-size: 1vw;">We employ reasonable and current security methods to prevent unauthorized access, maintain data accuracy, and ensure correct use of information.</p>
                <p style="font-size: 1vw;">No data transmission over the Internet or any wireless network can be guaranteed to be secure. As a result, while we try to protect your personal information, we cannot ensure or guarantee the security of any information you transmit to us, and you do so at your own risk.</p>

            <p style="font-size: 1vw;"><b>6. Children</b></p>
                <p style="font-size: 1vw;">The Service is not directed to children (persons under the age of 16), and we do not knowingly collect, either online or offline, Personally Identifiable Information from children.</p>

            <p style="font-size: 1vw;"><b>7. Changes to this Privacy Police</b></p>
                <p style="font-size: 1vw;">CAMAGRU may change this privacy policy from time to time. Please check frequently for changes.</p>


            <h2 style="font-size: 2vw;"><i>Terms & Conditions of Use</i></h2>
            <p style="font-size: 1vw;"><b> 1. Terms</b></p>
                <p style="font-size: 1vw;">By accessing this web site, you are agreeing to be bound by these web site Terms and Conditions of Use, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws. If you do not agree with any of these terms, you are prohibited from using or accessing this site. The materials contained in this web site are protected by applicable copyright and trade mark law.</p>

            <p style="font-size: 1vw;"><b>2. Use License</b></p>
                <p style="font-size: 1vw;">1. Permission is granted to temporarily download one copy of the materials (information or software) on CAMAGRU’s web site for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>
                <p style="font-size: 1vw;">i. modify or copy the materials;<br>ii. use the materials for any commercial purpose, or for any public display (commercial or non-commercial);<br>iii. attempt to decompile or reverse engineer any software contained on 7DEADLYMAG.COM’s web site;<br>iv. remove any copyright or other proprietary notations from the materials; or<br>v. transfer the materials to another person or “mirror” the materials on any other server.</p>
                <p style="font-size: 1vw;">2. This license shall automatically terminate if you violate any of these restrictions and may be terminated by CAMAGRU at any time. Upon terminating your viewing of these materials or upon the termination of this license, you must destroy any downloaded materials in your possession whether in electronic or printed format.</p>

            <p style="font-size: 1vw;"><b>3. Disclaimer</b></p>
            <p style="font-size: 1vw;">The materials on CAMAGRU’s web site are provided “as is”. CAMAGRU makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties, including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights. Further, CAMAGRU does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its Internet web site or otherwise relating to such materials or on any sites linked to this site.</p>

            <p style="font-size: 1vw;"><b>4. Limitations</b></p>
            <p style="font-size: 1vw;">In no event shall CAMAGRU or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption,) arising out of the use or inability to use the materials on CAMAGRU’s Internet site, even if CAMAGRU or a CAMAGRU authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you.</p>

            <p style="font-size: 1vw;"><b>5. Revisions and Errata</b></p>
            <p style="font-size: 1vw;">The materials appearing on CAMAGRU’s web site could include technical, typographical, or photographic errors. CAMAGRU does not warrant that any of the materials on its web site are accurate, complete, or current. CAMAGRU may make changes to the materials contained on its web site at any time without notice. CAMAGRU does not, however, make any commitment to update the materials.</p>

            <p style="font-size: 1vw;"><b>6. Links</b></p>
            <p style="font-size: 1vw;">CAMAGRU has not reviewed all of the sites linked to its Internet web site and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by CAMAGRU of the site. Use of any such linked web site is at the user’s own risk.</p>

            <p style="font-size: 1vw;"><b>7. Site Terms of Use Modifications</b></p>
            <p style="font-size: 1vw;">CAMAGRU may revise these terms of use for its web site at any time without notice. By using this web site you are agreeing to be bound by the then current version of these Terms and Conditions of Use.</p>

            <p style="font-size: 1vw;"><b>8. Governing Law</b></p>
            <p style="font-size: 1vw;">Any claim relating to CAMAGRU’s web site shall be governed by the laws of the Kingdom of Hyrule without regard to its conflict of law provisions.</p>
        </div>
    </div>

    <div class="footer"><h1>
            <a href="https://www.facebook.com/jinsere.mon.nom" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-linkedin"></a>
            <a href="https://www.twitter.com/alecsadier" class="fa fa-twitter"></a>
        </h1></div>

</div>
</body>

</html>