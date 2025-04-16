document.addEventListener("DOMContentLoaded", () => {
    const showFarmerForm = document.getElementById("showFarmerForm");
    const showCustomerForm = document.getElementById("showCustomerForm");
    const farmerForm = document.getElementById("farmerForm");
    const customerForm = document.getElementById("customerForm");
    const landingPage = document.getElementById("landingPage");
  
    const hideAllSections = () => {
      if (landingPage) landingPage.style.display = "none";
      if (farmerForm) farmerForm.classList.add("hidden");
      if (customerForm) customerForm.classList.add("hidden");
    };
  
    if (showFarmerForm) {
      showFarmerForm.addEventListener("click", () => {
        hideAllSections();
        if (farmerForm) farmerForm.classList.remove("hidden");
      });
    }
  
    if (showCustomerForm) {
      showCustomerForm.addEventListener("click", () => {
        hideAllSections();
        if (customerForm) customerForm.classList.remove("hidden");
      });
    }
  });
  