//MP_ValidaComprador.js
MercadoPago.SDK.setAccessToken("APP_USR-2981243273692847-042103-3e2a9c7daab132fc88385c450800f21e-247812013");
Payment payment=new Payment();
payment.setTransactionAmount(Float.valueOf(request.getParameter("transactionAmount")))
	   .setToken(request.getParameter("token"))
	   .setDescription(request.getParameter("description"))
	   .setInstallments(Integer.valueOf(request.getParameter("installments")))
	   .setPaymentMethodId(request.getParameter("paymentMethodId"));
Identification identification=new Identification(); 
identification.setNumber(request.getParameter("docNumber"));

Payer payer=new Payer();
payer.setEmail(request.getParameter("email"))
	 .setIdentification(identification);
payment.setPayer(payer);
payment.save();
System.out.println(payment.getStatus());