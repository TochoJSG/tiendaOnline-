//MP_Forma.js
const cardForm=mp.cardForm({
  amount: "100.5",
  autoMount: true,
  form:{
    id:"form-checkoutTocha",
    cardholderName:{
      id:"form-checkout__cardholderName",
      placeholder:"cardholderNameTocha",
    },
    cardholderEmail:{
      id:"form-checkout__cardholderEmail",
      placeholder:"cardholderEmailTocha",
    },
    cardNumber:{
      id:"form-checkout__cardNumber",
      placeholder:"cardNumberTocha",
    },
    cardExpirationMonth:{
      id:"form-checkout__cardExpirationMonth",
      placeholder:"cardExpirationMonthTocha",
    },
    cardExpirationYear:{
      id:"form-checkout__cardExpirationYear",
      placeholder:"cardExpirationYearTocha",
    },
    securityCode:{
      id:"form-checkout__securityCode",
      placeholder:"securityCodeTocha",
    },
    installments:{
      id:"form-checkout__installments",
      placeholder:"installmentsTocha",
    },
    identificationType:{
      id:"form-checkout__identificationType",
      placeholder:"identificationTypeTocha",
    },
    identificationNumber:{
      id:"form-checkout__identificationNumber",
      placeholder:"identificationNumberTocha",
    },
    issuer:{
      id:"form-checkout__issuer",
      placeholder:"issuerTocha",
    },
  },
  callbacks:{
    onFormMounted:error=>{
      if(error) return console.warn("Form Mounted handling error: ", error);
      console.log("Form mounted");
    },
    onSubmit:event=>{
      event.preventDefault();
      const{
        paymentMethodId:payment_method_id,
        issuerId:issuer_id,
        cardholderEmail:email,
        amount,
        token,
        installments,
        identificationNumber,
        identificationType,
      }=cardForm.getCardFormData();
      fetch("/process_payment",{
        method:"POST",
        headers:{"Content-Type":"application/json",},
        body:JSON.stringify({
          token,
          issuer_id,
          payment_method_id,
          transaction_amount:Number(amount),
          installments:Number(installments),
          description:"Descripción del producto",
          payer:{email,identification:{type:identificationType,number:identificationNumber,},},
        }),
      });
    },
    onFetching:(resource)=>{
      console.log("Fetching resource: ",resource);
      const progressBar = document.querySelector(".progress-bar");// Animate progress bar
      progressBar.removeAttribute("value");
      return ()=>{progressBar.setAttribute("value", "0");};
    },
  },
});