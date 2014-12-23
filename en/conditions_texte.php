<?php include_once("../include/_connexion.php"); ?>
<?
		$query  ="SELECT * FROM frais_port ";
		
		//echo $query ."<br>";
		$rstemp6 = mysql_query($query);
		$nb_enr6 = mysql_num_rows($rstemp6);
		if ($nb_enr6>=1){ // un code remise a été trouvé
			while ($row = mysql_fetch_array($rstemp6)) {
				$frais_port_fr =  $row["frais_port_fr"];
				$frais_port_ext =  $row["frais_port_ext"];
			}
		}
?>			
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>collants.fr - specialist in stockings</title>
<META NAME="description" content="Stocking and tights of high quality: for women and for men!">
<META NAME="keywords" content=" tights, stocking, knee-highs, socks, pantyhose, hold-ups, stockings, sheer stockings, hosiery, cecilia de raphael, cervin, cette, collanto, doredore, gerbe, goldenlady, lebourget, levee, mura, oroblu, philippe matignon,woman, women, wellness, emotion, dax, collants, collant">
<META content="ALL" name="robots">
<META content="document" name="resource-type">
<META content="15 days" name="revisit-after">
<META name="dc.description" content="Stocking and tights of high quality: for women and for men!">
<META name="dc.keywords" content="tights, stocking, knee-highs, socks, pantyhose, hold-ups, stockings, sheer stockings, hosiery, cecilia de raphael, cervin, cette, collanto, doredore, gerbe, goldenlady, lebourget, levee, mura, oroblu, philippe matignon,woman, women, wellness, emotion, dax, collants, collant">
<META name="author" CONTENT ="collants.fr">
<META name="dc.subject" content="Stocking and tights of high quality: for women and for men!">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="./include/collants_styles.css" rel="stylesheet" type="text/css">
</head>
<body id="fond_rose" border="0" background="images/fond_collants.gif" bgproperties="fixed">
<table width="425" border="0" cellpadding="21" align="left" >
    <td colspan="3" align="left" valign="top" id="texte2"><span id="texte3_blanc">TERMS</span><br>
      <br>
      Generalities
      <p>Conditions which follow establish the general conditions of sale of the 
        products offered on this site by the company collants.fr, zac du sablar, 
        25 All&eacute;e Pampara, 40100 Dax France<br>
        company registered in France at the RCS of DAX rcs 348 035 171<br>
        Phone number : 05.58.74.14.27.<br>
        Fax number : 05.58.74.14.27<br>
        e-mail : <a href="mailto:contact@collants.fr">contact@collants.fr </a><br>
      </p>
      <p><span id="texte3_blanc">COSTS AND PAYMENTS</span><br>
        <strong><br>
        Our modes of payment </strong><br>
        <br>
        On Collants.fr you have the possibility of paying by cheque, mandate cash 
        and bank card on line or by fax (Security Payment by CyberPlus Paiement 
        of the&#8221;Caisse d&#8217;Epargne). Carriage costs for the national 
        are <?php echo $frais_port_fr ?> € and for the international of <?php echo $frais_port_ext ?> €. Our delivery periods 
        are for the national of 48 hour by colissimo followed and for the international 
        of 5 days wrought in priority service of the Post office. Thus you can 
        order in full security on Collants.fr <br>
        <strong><br>
        Bank card on line <br>
        <br>
        Bank card by fax <br>
        <br>
        Bank check <br>
        <br>
        Cash order</strong><br>
        <strong><br>
        Protected payment by bank card on line.</strong><br>
        <br>
        When you place your order, you enter a safe zone in which you are invited 
        to give your bank co-ordinates. We use the system of payment on line of 
        ATOS (Payment made safe by CyberPlus Paiement of the &#8220; Caisse d&#8217;Epargne&#8221;) 
        to ensure the safety of the banking transactions. Co-ordinates of your 
        credit card are encrypted thanks to the protocol SSL (Secure Socket Layer) 
        and never forward in clear on the network. <br>
        <strong><br>
        </strong> <strong>Payment by bank card by fax </strong></p>
      <p>You can also transmit your bank co-ordinates by fax to us, once your 
        order is validated. By fax: print the summary of your order. Once dated 
        and signed, fax it to the 05.58.74.14.27 indicating your bank co-ordinates 
        to it.<br>
        <strong><br>
        Payment by bank cheque </strong><br>
        <br>
        All you have to do is printing the summary of your order, and sending 
        it to us dated and signed with your cheque established to the order of 
        COLLANTS.FR. Return us the whole by mail to the following address:<br>
        <br>
        <strong>zac du sablar<br>
        25 all&eacute;e pampara<br>
        40100 dax</strong></p>
      <p><strong>Payment by cash order</strong><br>
        <br>
        It is enough for you to print the summary of your order and go in a post 
        office to require to carry out a payment by cash order. You will then 
        pay in cash an amount corresponding to that of your order. You will address 
        then the first part of the cash order with the summary to the following 
        address: <br>
        <br>
        <strong>zac du sablar<br>
        25 all&eacute;e pampara<br>
        40100 dax</strong></p>
      <p>Order implies agreement with the general conditions of sale. Any order 
        with payment on line will be taken into account only after acceptance 
        of the payment by the GIE bank cards, consulted via the protected payment 
        server (SSL) SP Plus Payment &#8220;Caisse d&#8217;&eacute;pargne&#8221;. 
        The parties are agreed that the contract is subjected to the French right. 
        Collants.fr firm makes known to the consumer the whole of the essential 
        characteristics of the goods offered (sizes, colours, compositions). These 
        characteristics appear on the photography illustrating the offer. The 
        photographs illustrating the products do not enter into the contractual 
        field. The consumer admits that photography representing the product on 
        the Web site only has an indicative value. Indeed deteriorations can appear 
        because of the photograph&#8217;s treatment. Offers on line are valid 
        until exhaustion of stocks. Prices are indicated in Euros. <!-- VAT nonapplicable 
        article 293b of the tax code.--></p>
      <p><strong>Acceptance of the offer</strong> <br>
        <br>
        Acceptance and confirmation of order are carried out by a series of data 
        capture on successive screen pages. Final acceptance is bring into effect 
        by the processing of your bank co-ordinates (n&deg; of bank card and expiry 
        date) for payment on line.</p>
      <p><strong>Confirmation of order </strong><br>
        <br>
        The order&#8217;s number is communicated to you after acceptance by the 
        bank of the transaction. The order&#8217;s confirmation is sent to you 
        by e-mail at once. This one will recapitulate the summary of your order 
        and your order&#8217;s number. If cause beyond our&#8217;s control, an 
        article not available has been ordered, a notification of unavailability 
        will be addressed to you by e-mail and we will refund you at once the 
        amount of the missing article.</p>
      <p><strong>ORDER </strong><br>
        <br>
        The payment of the purchases is executed either by bank card or by bank 
        check. Settlement by check is only possible from France. Allowed bank 
        cards are: CB, Visa, Eurocard and Master Card. Customer&#8217;s bank account 
        will be debited after payment validation .<br>
        On Web site: collants.fr <br>
        By bank check, your order will be taken into account after reception of 
        the latter (France only). <br>
        By mail at : collants.fr - zac du Sablar - 25 all&eacute;e Pampara - 40100 
        Dax France</p>
      <p><strong>Protected PAYMENT </strong><br>
        <br>
        Your payments are protected.<br>
        Data that you transmit to us with your payment are protected using protocol 
        SSL. They are then treated by the financial services of the bank &#8220;Caisse 
        d&#8217;Epargne&#8221; which manages today millions electronic transactions. 
      </p>
      <p><strong>Protocol SSL</strong><br>
        <br>
        When you pay on line, your software of navigation transmits the transaction 
        in a protected mode. During your bank references capture, an encoding 
        is carried out by your navigator.With a relatively recent navigator, like 
        Microsoft Internet Explorer starting from the version 3.02 or Netscape 
        Communicator starting from version 2.0, it is automatic. But for a safety 
        even larger, that is to say an encoding even more difficult to decipher, 
        it is better uses Microsoft Internet Explorer starting from version 5.5 
        or Netscape Communicator starting from version 6.0, which carry out an 
        encoding SSL(SSL = Secure Socket Layer) with 128 bits. If your Internet 
        Explorer or Netscape&#8217;s version is really very old, we highly advise 
        you to download the update on their site, Microsoft or Netscape.Your bank 
        card number isn&#8217;t printed on paper, invoices, small invoice or another 
        listing. The tradesman is not informed of the card numbers. </p>
      <p><strong>Certified payment: </strong><br>
        <br>
        For a payment carried out with ID-TRONIC, safety is maximum. In fact, 
        your identity is absolutely guaranteed with respect to the tradesman. 
        It is very primordial for important purchases. In case of problem during 
        the payment, the bank &#8220;Caisse d&#8217;Epargne&#8221; is at your 
        disposal to help you to solve it as soon as possible. If you note an illicit 
        use of your bank card, you can dispute with your bank. In accordance with 
        the regulation, this one will be able to cancel the transaction in the 
        condition which you did not provide your confidential code, but you never 
        have to do it when you use system SP MORE (Pay attention, you must not 
        be delivered by the credited tradesman!) </p>
      <p><strong>Protected PAYMENT </strong><br>
        <br>
        Our site has one of the most powerful security systems at the present 
        time. We have adopted the process of encoding SSL but have also reinforcing 
        the whole of the processes of interference and encoding in order to protect 
        more effectively all the significant data related to the means of payment. 
        <br>
        Payment on line is immediate and is carried out exclusively by bank card. 
        Cards CB, Visa, and Master Card are accepted. In order to ensure the safety 
        of the payments, collants.fr uses the service of protected payments SP 
        Plus Payment of our bank &#8220; Caisse d&#8217;Epargne&#8221;. This service 
        integrates the safety requirement SSL. Confidential data (n&deg; of bank 
        card with 16 digits, expiry date) are transmitted encoded on the platform 
        of the bank &#8220;caisse d&#8217;&eacute;pargne&#8221; and are not transmitted 
        on our server. When you validate your order: Your request for payment 
        is sort and route in real time on the telepayment administrator protected 
        of the &#8220;Caisse d&#8217;Epargne&#8221;; this one addresses an authorization 
        request to the bank card network , the telepayment's administrator will 
        check the validity of the card to issue an electronic certificate with 
        the transaction&#8217;s number.<br>
        On the contrary (error of number, card in opposition) this one informs 
        you that the transaction is rejected. Being within the framework of a 
        remote payment by bank card, the payment order can be revoked in the event 
        of fraudulent use of the card in accordance with the convention concluded 
        between the consumer and his banking house.</p>
      <p><strong>Deliveries </strong><br>
        <br>
        Delivery period is 2 to 3 days wrought *. Delivery is carried out by the 
        post office by followed collissimo, for France and Europe, and in priority 
        service of the Post office for international. <br>
        Tariff for France: <?php echo $frais_port_fr ?> €<br>
        Europe: <?php echo $frais_port_ext ?> €<br>
        International: <?php echo $frais_port_ext ?> €<br>
        For sending outside the European Union, possible taxes (local tax, customs 
        or importation VAT) could be invoiced at the product&#8217;s arrival at 
        destination and will be at the responsibility of the recipient. Delivery 
        will be executed from Monday to Saturday at the address that you will 
        have indicated to us on the purchase order in France.</p>
      
		
		 <p><strong>Return </strong><br>
        <br>
     The products such as bottom, sticking, knee socks, gaiter, leggings and other articles sold on the www.collants.fr site must not be loosened and left their packing so that the consumer  can profit from the right of retractation. Only will be taken again the  products returned as a whole, in their packing of origin complete and  intact, and in a perfect state of resale. Very product which will have  been damaged, or whose packing of origin will have been deteriorated,  neither will be refunded nor exchanged. This right of retractation is  exerted without penalty, except for the expenses of return. On the  assumption of the exercise of the right of retractation, the consumer  has the choice to ask either for the refunding of the paid sums, or the  exchange of the product. In the case of an exchange, the reforwarding  will be done with the expenses of the consumer. In the event of  exercise of the right of retractation, the Collants.fr
	   site will make all the efforts to refund the consumer within 10 day.  The consumer will then be refunded by recr&eacute;dit of his bank account  (protected transaction) in the event of payment by bank card, or cheque  in the other cases&nbsp;  .</p>
		
		<p><strong>SATISFIED OR REFUNDED </strong><br>
        <br>
        The buyer has a 7 days deadline as from the delivery (in accordance with 
        the laws resulting from the code of consumption Art. L 121-16) to return 
        inappropriate product. On the other hand, we will not be able to retake:<br>
        - Incomplete items, damaged or soiled by the client,<br>
        - articles with their labels in their packaging (tights or stocking tested 
        and/or unfolded)</p>
      <p>- Parcels for which no element makes it possible to identify the shipper 
        (n&deg; order, name, first name, address), elements which are registered 
        on the form of return.</p>
      <p><strong>Remote refunding: </strong><br>
        <br>
        You have a delay of 7 days retraction as from the day of the reception 
        to return products ordered for a refunding, if you changed opinion, if 
        the received articles are not in conformity with the description or if 
        they are defective. It is necessary to return within 7 day after reception 
        your parcel including the article in its packaging and the return form 
        duly filled. The expenses of return are part of your duty. The return 
        of products permit you to obtain credit, equal to the purchase price of 
        the bought products. A credit doesn&#8217;t include a possible expenses 
        of delivery. The refunding which is carried out by cheque is at the latest 
        15 days after the reception of the parcel by collants.fr (the costs of 
        the outward transport are paid). </p>
      <p><strong>Personal data</strong><br>
        <br>
        Data collected by collants.fr on the site collants.fr are intended to 
        him. You can give your assent or be opposed to the use of the data collected 
        under the terms of this order, in the files of customers of collants.fr 
        or used by thirds. In accordance with the law n&deg; 78-17 of January 
        6, 1978, known as Data-processing Law and Freedoms, you have a right of 
        access, of correction and suppression for any information concerning you. 
        This right can be exerted by mail at the following address: Customer service 
        collants.fr zac of the sablar - 25 all&eacute;e pampara - 40100 dax or 
        by e-mail:<a href="mailto:contact@collants.fr">contact@collants.fr</a></p>
      <p><strong>Payment of the litigations<br>
        </strong><br>
        RESPONSIBILITY The offered products are in conformity with the French 
        legislation in force. The responsibility of collants.fr could not be assume 
        in the case of no respect of the country&#8217;s legislation where the 
        products are delivered. The purchaser can check with the local authorities 
        the possibilities of importation or use of the products or services which 
        he plans to order. The photographs and texts reproduced and illustrating 
        the products presented are not contractual. Consequently, collants.fr 
        shall not be responsible for any errors in one of these photographs or 
        one of these texts. Collants.fr could not be liable for no execution of 
        the contract concluded in the case of unavailability or out-of-stock condition 
        of the product, of cause beyond control, disturbance, all-out strike or 
        partial in particular of the mail service and transport and/or communications, 
        flood, fire. Collants.fr will not incur any responsibility for all indirect 
        damages because of present, development loss, loss of profit, loss of 
        chance, damage or expenses. Links hypertexts can return towards other 
        sites that collants.fr. collants.fr disclaim responsibility if the contents 
        of these sites would not contravene the legal and prescribed provisions 
        in force. On the assumption that a litigation is born from this contractual 
        relation, the parts commit themselves to search conciliatory solution 
        before any judicial action. The parts are agreed that any litigation born 
        of this contract are the exclusive competence of the jurisdictions of 
        DAX (FRANCE).<br>
      </p>
      <br>
      </td>
  </tr>
</table>
</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>
