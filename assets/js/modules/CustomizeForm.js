import { errorToast, successFormToast } from "../modules/toastify";

export function CustomizeProduct() {
  const CustomizeForm = document.getElementById("customize_form");
  if (!CustomizeForm) return;

  CustomizeForm.addEventListener('submit', (e) => {

    e.preventDefault();
    const formData = new FormData(CustomizeForm, e.submitter);
    const closeform = document.querySelectorAll('.customize');

    formData.append('_nonce', restDetails.nonce);
    jQuery(($) => {
      $.ajax({
        type: "POST",
        url: restDetails.url + 'cynApi/v1/form/customize',
        cache: false,
        processData: false,
        contentType: false,
        data: formData,
        success: (res) => {
          successFormToast.showToast();
          CustomizeForm.reset();
          
        },

        error: (error) => {
          errorToast.showToast();
          console.log(error);
 
        },
      });
    });
  });
}
CustomizeProduct();