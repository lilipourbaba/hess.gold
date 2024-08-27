import { errorToast, successFormToast } from "../modules/toastify";

export function contactUsPage() {
   const contactForm = document.getElementById("contactForm");
  if (!contactUsPage || !contactForm) return;

  contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(contactForm, e.submitter);
    formData.append('_nonce', restDetails.nonce);
    jQuery(($) => {
      $.ajax({
        type: "POST",
        url: restDetails.url + 'cynApi/v1/form/contact-us',
        cache: false,
        processData: false,
        contentType: false,
        data: formData,
        success: (res) => {
          successFormToast.showToast();
          contactForm.reset();
        },

        error: (error) => {
          errorToast.showToast();
          console.log(error);
        },
      });
    });
  });
}
contactUsPage();