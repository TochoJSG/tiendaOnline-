MercadoPago.SDK.setAccessToken("YOUR_ACCESS_TOKEN");
		Payment payment = new Payment();
		payment.setTransactionAmount(Float.valueOf(request.getParameter("transactionAmount")))
			   .setToken(request.getParameter("token"))
			   .setDescription(request.getParameter("description"))
			   .setInstallments(Integer.valueOf(request.getParameter("installments")))
			   .setPaymentMethodId(request.getParameter("paymentMethodId"));

		Identification identification = new Identification(); 
		identification.setNumber(request.getParameter("docNumber"));

		Payer payer = new Payer();
		payer.setEmail(request.getParameter("email"))
			 .setIdentification(identification);

		payment.setPayer(payer);

		payment.save();

		System.out.println(payment.getStatus());