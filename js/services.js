function handleButtonGroupClick(groupId, inputId) {
  const group = document.getElementById(groupId);
  const buttons = group.querySelectorAll(".btn");
  const input = document.getElementById(inputId);
  buttons.forEach((button) => {
    button.addEventListener("click", function () {
      buttons.forEach((btn) => btn.classList.remove("active"));
      this.classList.add("active");
      input.value = this.getAttribute("data-value");
      input.dispatchEvent(new Event("change"));
    });
  });
}

handleButtonGroupClick("suitTypeGroup", "suitType");
handleButtonGroupClick("topSizeGroup", "topSize");
handleButtonGroupClick("styleGroup", "style");
handleButtonGroupClick("neckStyleGroup", "neckStyle");
handleButtonGroupClick("sleeveLengthGroup", "sleeveLength");
handleButtonGroupClick("damaanGroup", "damaan");
handleButtonGroupClick("laceSourceGroup", "laceSource");
handleButtonGroupClick("buttonStyleGroup", "buttonStyle");
handleButtonGroupClick("bottomTypeGroup", "bottomType");
handleButtonGroupClick("bottomSizeGroup", "bottomSize");
handleButtonGroupClick("bottomLaceSourceGroup", "bottomLaceSource");
handleButtonGroupClick("dupattaLaceSourceGroup", "dupattaLaceSource");
handleButtonGroupClick("maleStyleGroup", "maleStyle");
handleButtonGroupClick("maleSizeGroup", "maleSize");
handleButtonGroupClick("maleCollarStyleGroup", "maleCollarStyle");
handleButtonGroupClick("maleDamaanGroup", "maleDamaan");
handleButtonGroupClick("maleButtonSourceGroup", "maleButtonSource");
handleButtonGroupClick("maleButtonStyleGroup", "maleButtonStyle");
handleButtonGroupClick("maleSleevesGroup", "maleSleeves");
handleButtonGroupClick("maleBottomTypeGroup", "maleBottomType");
handleButtonGroupClick("maleBottomSizeGroup", "maleBottomSize");

function toggleSection(sectionId, isVisible, requiredFields = []) {
  const section = document.getElementById(sectionId);
  section.classList.toggle("active", isVisible);
  section.setAttribute("aria-hidden", !isVisible);
  requiredFields.forEach((id) => {
    const field = document.getElementById(id);
    if (field) field.required = isVisible;
  });
}

function updateProgress() {
  const requiredFields = document.querySelectorAll(
    "input[required], select[required], textarea[required]"
  );
  const filledRequiredFields = Array.from(requiredFields).filter(
    (field) => field.value !== ""
  );
  const progress =
    requiredFields.length > 0
      ? (filledRequiredFields.length / requiredFields.length) * 100
      : 0;
  document.querySelector(".progress-bar-fill").style.width = `${progress}%`;
}

function updateActiveTab() {
  const activeTab = document.querySelector(".tab-pane.active").id;
  document.getElementById("activeTab").value = activeTab;
}

function selectFirstImage(galleryId, inputId) {
  const gallery = document.getElementById(galleryId);
  const firstImage = gallery.querySelector("img");
  if (firstImage) {
    firstImage.classList.add("selected");
    const input = document.getElementById(inputId);
    input.value = firstImage.src;
    input.dispatchEvent(new Event("change"));
  }
}

function getImageName(src) {
  if (!src) return "Not selected";
  const parts = src.split("/");
  const fileName = parts[parts.length - 1].split(".")[0];
  return `image${fileName.match(/\d+$/)?.[0] || "1"}`;
}

function populateSleeveStyleImages() {
  const sleeveStyleImages = document.getElementById("sleeveStyleImages");
  const sleeveStyleImageInput = document.getElementById("sleeveStyleImage");
  sleeveStyleImages.innerHTML = "";
  sleeveStyleImageInput.value = "";
  const imagePaths = [
    "images/sleeves/female/style_1.PNG",
    "images/sleeves/female/style_2.PNG",
  ];
  imagePaths.forEach((src, index) => {
    const img = document.createElement("img");
    img.src = src;
    img.alt = `Sleeve Style ${index + 1}`;
    img.addEventListener("click", function () {
      sleeveStyleImages
        .querySelectorAll("img")
        .forEach((i) => i.classList.remove("selected"));
      this.classList.add("selected");
      sleeveStyleImageInput.value = this.src;
      sleeveStyleImageInput.dispatchEvent(new Event("change"));
    });
    sleeveStyleImages.appendChild(img);
  });
  selectFirstImage("sleeveStyleImages", "sleeveStyleImage");
}

function setupButtonImages() {
  const buttonImages = document.querySelectorAll("#buttonImages img");
  const buttonImageInput = document.getElementById("buttonImage");
  buttonImages.forEach((img) => {
    img.addEventListener("click", function () {
      buttonImages.forEach((i) => i.classList.remove("selected"));
      this.classList.add("selected");
      buttonImageInput.value = this.src;
      buttonImageInput.dispatchEvent(new Event("change"));
    });
  });
}

function setupMaleButtonImages() {
  const buttonImages = document.querySelectorAll("#maleButtonImages img");
  const buttonImageInput = document.getElementById("maleButtonImage");
  buttonImages.forEach((img) => {
    img.addEventListener("click", function () {
      buttonImages.forEach((i) => i.classList.remove("selected"));
      this.classList.add("selected");
      buttonImageInput.value = this.src;
      buttonImageInput.dispatchEvent(new Event("change"));
      const price = this.getAttribute("data-price") || 0;
      document.getElementById(
        "selectedMaleButtonPrice"
      ).textContent = `Selected Button Price: PKR ${price}`;
    });
  });
}

document.getElementById("suitType").addEventListener("change", function () {
  const value = this.value;
  toggleSection("topSection", value !== "", [
    "topSize",
    "style",
    "neckStyle",
    "sleeveLength",
    "sleeveStyleImage",
    "damaan",
    "laceYes",
    "laceNo",
    "buttonsYes",
    "buttonsNo",
  ]);
  toggleSection("bottomSection", value === "2pieceTB" || value === "3piece", [
    "bottomType",
    "bottomSize",
    "bottomLaceYes",
    "bottomLaceNo",
  ]);
  toggleSection("dupattaSection", value === "2pieceTD" || value === "3piece", [
    "dupattaLaceYes",
    "dupattaLaceNo",
  ]);
  updateSummary();
  updateProgress();
});

document.getElementById("topSize").addEventListener("change", function () {
  const size = this.value;
  const sleeveGroup = document.getElementById("sleeveLengthGroup");
  sleeveGroup.innerHTML = "";
  const sleeveInput = document.getElementById("sleeveLength");
  sleeveInput.value = "";
  if (size) {
    const maxLengths = { 6: 20.5, 8: 21, 10: 21.5, 12: 22, 14: 23, 16: 24 };
    const maxLength = maxLengths[size];
    for (let i = 10; i <= maxLength; i += 0.5) {
      const button = document.createElement("button");
      button.type = "button";
      button.className = "btn btn-outline-primary";
      button.setAttribute("data-value", i);
      button.textContent = i;
      button.addEventListener("click", function () {
        sleeveGroup
          .querySelectorAll(".btn")
          .forEach((btn) => btn.classList.remove("active"));
        this.classList.add("active");
        sleeveInput.value = this.getAttribute("data-value");
        sleeveInput.dispatchEvent(new Event("change"));
      });
      sleeveGroup.appendChild(button);
    }
  }
  sleeveInput.required = !!size;
  updateSummary();
  updateProgress();
});

function updateStyleImages() {
  const style = document.getElementById("style").value;
  const neckStyle = document.getElementById("neckStyle").value;
  const styleImages = document.getElementById("styleImages");
  const styleImageInput = document.getElementById("styleImage");
  styleImages.innerHTML = "";
  styleImageInput.value = "";
  const imagePaths = {
    Kurta: {
      "V-Neck": [
        "images/neck_styles/female/vn_style_1.PNG",
        "images/neck_styles/female/vn_style_2.PNG",
        "images/neck_styles/female/vn_style_3.PNG",
        "images/neck_styles/female/vn_style_4.PNG",
      ],
      Round: [
        "images/neck_styles/female/rn_style_1.PNG",
        "images/neck_styles/female/rn_style_2.PNG",
        "images/neck_styles/female/rn_style_3.PNG",
        "images/neck_styles/female/rn_style_4.PNG",
        "images/neck_styles/female/rn_style_5.PNG",
      ],
      Collar: [
        "images/neck_styles/female/cn_style_1.PNG",
        "images/neck_styles/female/cn_style_2.PNG",
      ],
    },
    Kameez: {
      "V-Neck": [
        "images/neck_styles/female/vn_style_1.PNG",
        "images/neck_styles/female/vn_style_2.PNG",
        "images/neck_styles/female/vn_style_3.PNG",
        "images/neck_styles/female/vn_style_4.PNG",
      ],
      Round: [
        "images/neck_styles/female/rn_style_1.PNG",
        "images/neck_styles/female/rn_style_2.PNG",
        "images/neck_styles/female/rn_style_3.PNG",
        "images/neck_styles/female/rn_style_4.PNG",
        "images/neck_styles/female/rn_style_5.PNG",
      ],
      Collar: [
        "images/neck_styles/female/cn_style_1.PNG",
        "images/neck_styles/female/cn_style_2.PNG",
      ],
    },
  };
  if (style && neckStyle && imagePaths[style]?.[neckStyle]) {
    imagePaths[style][neckStyle].forEach((src, index) => {
      const img = document.createElement("img");
      img.src = src;
      img.alt = `Neck Style ${index + 1}`;
      img.addEventListener("click", function () {
        styleImages
          .querySelectorAll("img")
          .forEach((i) => i.classList.remove("selected"));
        this.classList.add("selected");
        styleImageInput.value = this.src;
        styleImageInput.dispatchEvent(new Event("change"));
      });
      styleImages.appendChild(img);
    });
    selectFirstImage("styleImages", "styleImage");
  }
}

document.getElementById("style").addEventListener("change", updateStyleImages);
document
  .getElementById("neckStyle")
  .addEventListener("change", updateStyleImages);

function updateDamaanImages() {
  const damaan = document.getElementById("damaan").value;
  const damaanImages = document.getElementById("damaanImages");
  const damaanImageInput = document.getElementById("damaanImage");
  damaanImages.innerHTML = "";
  damaanImageInput.value = "";
  const imagePaths = {
    Round: [
      "images/damaan/female/round_style_1.PNG",
     
    ],
    Square: [
      "images/damaan/female/square_style_1.PNG",
    
    ],
  };
  if (damaan && imagePaths[damaan]) {
    imagePaths[damaan].forEach((src, index) => {
      const img = document.createElement("img");
      img.src = src;
      img.alt = `Damaan Style ${index + 1}`;
      img.addEventListener("click", function () {
        damaanImages
          .querySelectorAll("img")
          .forEach((i) => i.classList.remove("selected"));
        this.classList.add("selected");
        damaanImageInput.value = this.src;
        damaanImageInput.dispatchEvent(new Event("change"));
      });
      damaanImages.appendChild(img);
    });
    selectFirstImage("damaanImages", "damaanImage");
  }
}

document
  .getElementById("damaan")
  .addEventListener("change", updateDamaanImages);

function updateLaceOptions() {
  const laceYes = document.getElementById("laceYes").checked;
  toggleSection("laceOptions", laceYes, [
    "laceSource",
    "laceColor",
    "laceImage",
    "laceFront",
    "laceBack",
    "laceFrontBack",
  ]);
  updateLaceLibraryOptions();
  updateSummary();
  updateProgress();
}

function updateLaceLibraryOptions() {
  const laceSource = document.getElementById("laceSource").value;
  const isLibrary = laceSource === "library";
  toggleSection("laceLibraryOptions", isLibrary, ["laceColor", "topLaceImage"]);
  const laceImages = document.querySelectorAll("#topLaceImages img");
  const laceImageInput = document.getElementById("topLaceImage");
  laceImages.forEach((img) => {
    img.addEventListener("click", function () {
      laceImages.forEach((i) => i.classList.remove("selected"));
      this.classList.add("selected");
      laceImageInput.value = this.src;
      laceImageInput.dispatchEvent(new Event("change"));
      const price = this.getAttribute("data-price") || 0;
      document.getElementById(
        "selectedLacePriceTop"
      ).textContent = `Selected Lace Price: PKR ${price} per gazz`;
    });
  });
  if (isLibrary) selectFirstImage("topLaceImages", "topLaceImage");
  updateSummary();
  updateProgress();
}

document
  .getElementById("laceYes")
  .addEventListener("change", updateLaceOptions);
document.getElementById("laceNo").addEventListener("change", updateLaceOptions);
document
  .getElementById("laceSource")
  .addEventListener("change", updateLaceLibraryOptions);

function updateButtonOptions() {
  const buttonsYes = document.getElementById("buttonsYes").checked;
  toggleSection("buttonOptions", buttonsYes, ["buttonStyle", "buttonImage"]);
  setupButtonImages();
  if (buttonsYes) selectFirstImage("buttonImages", "buttonImage");
  updateSummary();
  updateProgress();
}

document
  .getElementById("buttonsYes")
  .addEventListener("change", updateButtonOptions);
document
  .getElementById("buttonsNo")
  .addEventListener("change", updateButtonOptions);

function updateButtonStyleImages() {
  const buttonStyle = document.getElementById("buttonStyle").value;
  const buttonStyleImages = document.getElementById("buttonStyleImages");
  const buttonStyleImageInput = document.getElementById("buttonStyleImage");
  buttonStyleImages.innerHTML = "";
  buttonStyleImageInput.value = "";
  const imagePaths = {
    double: ["images/buttons/female/double_placket.PNG"],
    single: ["images/buttons/female/single_placket.PNG"],
  };
  if (buttonStyle && imagePaths[buttonStyle]) {
    imagePaths[buttonStyle].forEach((src, index) => {
      const img = document.createElement("img");
      img.src = src;
      img.alt = `Button Style ${index + 1}`;
      img.addEventListener("click", function () {
        buttonStyleImages
          .querySelectorAll("img")
          .forEach((i) => i.classList.remove("selected"));
        this.classList.add("selected");
        buttonStyleImageInput.value = this.src;
        buttonStyleImageInput.dispatchEvent(new Event("change"));
      });
      buttonStyleImages.appendChild(img);
    });
    selectFirstImage("buttonStyleImages", "buttonStyleImage");
  }
}

document
  .getElementById("buttonStyle")
  .addEventListener("change", updateButtonStyleImages);

function updateBottomStyleImages() {
  const bottomType = document.getElementById("bottomType").value;
  const bottomStyleImages = document.getElementById("bottomStyleImages");
  const bottomStyleImageInput = document.getElementById("bottomStyleImage");
  bottomStyleImages.innerHTML = "";
  bottomStyleImageInput.value = "";
  const imagePaths = {
    Shalwar: [
      "images/shalwar/female/style_1.PNG",
      "images/shalwar/female/style_2.PNG",
      "images/shalwar/female/style_3.PNG",
      "images/shalwar/female/style_4.PNG",
    ],
    Trouser: [
      "images/trouser/female/style_1.PNG",
      "images/trouser/female/style_2.PNG",
      "images/trouser/female/style_3.PNG",
    ],
  };
  if (bottomType && imagePaths[bottomType]) {
    imagePaths[bottomType].forEach((src, index) => {
      const img = document.createElement("img");
      img.src = src;
      img.alt = `Bottom Style ${index + 1}`;
      img.addEventListener("click", function () {
        bottomStyleImages
          .querySelectorAll("img")
          .forEach((i) => i.classList.remove("selected"));
        this.classList.add("selected");
        bottomStyleImageInput.value = this.src;
        bottomStyleImageInput.dispatchEvent(new Event("change"));
      });
      bottomStyleImages.appendChild(img);
    });
    selectFirstImage("bottomStyleImages", "bottomStyleImage");
  }
}

document
  .getElementById("bottomType")
  .addEventListener("change", updateBottomStyleImages);

function updateBottomLaceOptions() {
  const bottomLaceYes = document.getElementById("bottomLaceYes").checked;
  toggleSection("bottomLaceOptions", bottomLaceYes, [
    "bottomLaceSource",
    "bottomLaceColor",
    "bottomLaceImage",
  ]);
  updateBottomLaceLibraryOptions();
  updateSummary();
  updateProgress();
}

function updateBottomLaceLibraryOptions() {
  const bottomLaceSource = document.getElementById("bottomLaceSource").value;
  const isLibrary = bottomLaceSource === "library";
  toggleSection("bottomLaceLibraryOptions", isLibrary, [
    "bottomLaceColor",
    "bottomLaceImage",
  ]);
  const laceImages = document.querySelectorAll("#bottomLaceImages img");
  const bottomLaceImageInput = document.getElementById("bottomLaceImage");
  laceImages.forEach((img) => {
    img.addEventListener("click", function () {
      laceImages.forEach((i) => i.classList.remove("selected"));
      this.classList.add("selected");
      bottomLaceImageInput.value = this.src;
      bottomLaceImageInput.dispatchEvent(new Event("change"));
      const price = this.getAttribute("data-price") || 0;
      document.getElementById(
        "selectedLacePriceBottom"
      ).textContent = `Selected Lace Price: PKR ${price} per gazz`;
    });
  });
  if (isLibrary) selectFirstImage("bottomLaceImages", "bottomLaceImage");
  updateSummary();
  updateProgress();
}
document
  .getElementById("bottomLaceYes")
  .addEventListener("change", updateBottomLaceOptions);
document
  .getElementById("bottomLaceNo")
  .addEventListener("change", updateBottomLaceOptions);
document
  .getElementById("bottomLaceSource")
  .addEventListener("change", updateBottomLaceLibraryOptions);

function updateDupattaLaceOptions() {
  const dupattaLaceYes = document.getElementById("dupattaLaceYes").checked;
  toggleSection("dupattaLaceOptions", dupattaLaceYes, [
    "dupattaLaceSource",
    "dupattaLaceColor",
    "dupattaLaceImage",
    "dupattaLacePallu",
    "dupattaLaceAllSides",
  ]);
  updateDupattaLaceLibraryOptions();
  updateSummary();
  updateProgress();
}

function updateDupattaLaceLibraryOptions() {
  const dupattaLaceSource = document.getElementById("dupattaLaceSource").value;
  const isLibrary = dupattaLaceSource === "library";
  toggleSection("dupattaLaceLibraryOptions", isLibrary, [
    "dupattaLaceColor",
    "dupattaLaceImage",
  ]);
  const laceImages = document.querySelectorAll("#dupattaLaceImages img");
  const dupattaLaceImageInput = document.getElementById("dupattaLaceImage");
  laceImages.forEach((img) => {
    img.addEventListener("click", function () {
      laceImages.forEach((i) => i.classList.remove("selected"));
      this.classList.add("selected");
      dupattaLaceImageInput.value = this.src;
      dupattaLaceImageInput.dispatchEvent(new Event("change"));
      const price = this.getAttribute("data-price") || 0;
      document.getElementById(
        "selectedLacePriceDupatta"
      ).textContent = `Selected Lace Price: PKR ${price} per gazz`;
    });
  });
  if (isLibrary) selectFirstImage("dupattaLaceImages", "dupattaLaceImage");
  updateSummary();
  updateProgress();
}

document
  .getElementById("dupattaLaceYes")
  .addEventListener("change", updateDupattaLaceOptions);
document
  .getElementById("dupattaLaceNo")
  .addEventListener("change", updateDupattaLaceOptions);
document
  .getElementById("dupattaLaceSource")
  .addEventListener("change", updateDupattaLaceLibraryOptions);

function updateMaleCollarImages() {
  const collarStyle = document.getElementById("maleCollarStyle").value;
  const collarImages = document.getElementById("maleCollarImages");
  const collarImageInput = document.getElementById("maleCollarImage");
  collarImages.innerHTML = "";
  collarImageInput.value = "";
  const imagePaths = {
    Sherwani: ["images/neck_styles/male/semi_collar.PNG"],
    Full: ["images/neck_styles/male/full_collar.PNG"],
  };
  if (collarStyle && imagePaths[collarStyle]) {
    imagePaths[collarStyle].forEach((src, index) => {
      const img = document.createElement("img");
      img.src = src;
      img.alt = `Collar Style ${index + 1}`;
      img.addEventListener("click", function () {
        collarImages
          .querySelectorAll("img")
          .forEach((i) => i.classList.remove("selected"));
        this.classList.add("selected");
        collarImageInput.value = this.src;
        collarImageInput.dispatchEvent(new Event("change"));
      });
      collarImages.appendChild(img);
    });
    selectFirstImage("maleCollarImages", "maleCollarImage");
  }
}

document
  .getElementById("maleCollarStyle")
  .addEventListener("change", updateMaleCollarImages);

function updateMaleDamaanImages() {
  const damaan = document.getElementById("maleDamaan").value;
  const damaanImages = document.getElementById("maleDamaanImages");
  const damaanImageInput = document.getElementById("maleDamaanImage");
  damaanImages.innerHTML = "";
  damaanImageInput.value = "";
  const imagePaths = {
    Round: ["images/damaan/male/round.PNG"],
    Square: ["images/damaan/male/square.PNG"],
  };
  if (damaan && imagePaths[damaan]) {
    imagePaths[damaan].forEach((src, index) => {
      const img = document.createElement("img");
      img.src = src;
      img.alt = `Damaan Style ${index + 1}`;
      img.addEventListener("click", function () {
        damaanImages
          .querySelectorAll("img")
          .forEach((i) => i.classList.remove("selected"));
        this.classList.add("selected");
        damaanImageInput.value = this.src;
        damaanImageInput.dispatchEvent(new Event("change"));
      });
      damaanImages.appendChild(img);
    });
    selectFirstImage("maleDamaanImages", "maleDamaanImage");
  }
}

document
  .getElementById("maleDamaan")
  .addEventListener("change", updateMaleDamaanImages);

function updateMaleButtonOptions() {
  const buttonsYes = document.getElementById("maleButtonsYes").checked;
  toggleSection("maleButtonOptions", buttonsYes, [
    "maleButtonSource",
    "maleButtonStyle",
    "maleButtonImage",
  ]);
  updateMaleButtonLibraryOptions();
  setupMaleButtonImages();
  updateSummary();
  updateProgress();
}

function updateMaleButtonLibraryOptions() {
  const buttonSource = document.getElementById("maleButtonSource").value;
  const isLibrary = buttonSource === "library";
  toggleSection("maleButtonLibraryOptions", isLibrary, ["maleButtonImage"]);
  if (isLibrary) selectFirstImage("maleButtonImages", "maleButtonImage");
  updateSummary();
  updateProgress();
}

document
  .getElementById("maleButtonsYes")
  .addEventListener("change", updateMaleButtonOptions);
document
  .getElementById("maleButtonsNo")
  .addEventListener("change", updateMaleButtonOptions);
document
  .getElementById("maleButtonSource")
  .addEventListener("change", updateMaleButtonLibraryOptions);

function updateMaleButtonStyleImages() {
  const buttonStyle = document.getElementById("maleButtonStyle").value;
  const buttonStyleImages = document.getElementById("maleButtonStyleImages");
  const buttonStyleImageInput = document.getElementById("maleButtonStyleImage");
  buttonStyleImages.innerHTML = "";
  buttonStyleImageInput.value = "";
  const imagePaths = {
    double: ["images/buttons/male/double_placket.PNG"],
    single: ["images/buttons/male/single_placket.PNG"],
  };
  if (buttonStyle && imagePaths[buttonStyle]) {
    imagePaths[buttonStyle].forEach((src, index) => {
      const img = document.createElement("img");
      img.src = src;
      img.alt = `Button Style ${index + 1}`;
      img.addEventListener("click", function () {
        buttonStyleImages
          .querySelectorAll("img")
          .forEach((i) => i.classList.remove("selected"));
        this.classList.add("selected");
        buttonStyleImageInput.value = this.src;
        buttonStyleImageInput.dispatchEvent(new Event("change"));
      });
      buttonStyleImages.appendChild(img);
    });
    selectFirstImage("maleButtonStyleImages", "maleButtonStyleImage");
  }
}

document
  .getElementById("maleButtonStyle")
  .addEventListener("change", updateMaleButtonStyleImages);

function updateMaleSleevesImages() {
  const sleeves = document.getElementById("maleSleeves").value;
  const sleevesImages = document.getElementById("maleSleevesImages");
  const sleevesImageInput = document.getElementById("maleSleevesImage");
  const disclaimer =
    document.getElementById("maleSleevesDisclaimer") ||
    document.createElement("p");
  disclaimer.id = "maleSleevesDisclaimer";
  disclaimer.className = "disclaimer mt-2";
  disclaimer.style.display = sleeves === "Cuff" ? "block" : "none";
  disclaimer.textContent =
    "Disclaimer: Cuff sleeves include two buttons per sleeve (total 4 buttons) for an additional PKR 100.";
  sleevesImages.parentNode.insertBefore(disclaimer, sleevesImages.nextSibling);
  sleevesImages.innerHTML = "";
  sleevesImageInput.value = "";
  const imagePaths = {
    Straight: ["images/sleeves/male/straight.PNG"],
    Cuff: ["images/sleeves/male/cuff.PNG"],
  };
  if (sleeves && imagePaths[sleeves]) {
    imagePaths[sleeves].forEach((src, index) => {
      const img = document.createElement("img");
      img.src = src;
      img.alt = `Sleeves Style ${index + 1}`;
      img.addEventListener("click", function () {
        sleevesImages
          .querySelectorAll("img")
          .forEach((i) => i.classList.remove("selected"));
        this.classList.add("selected");
        sleevesImageInput.value = this.src;
        sleevesImageInput.dispatchEvent(new Event("change"));
      });
      sleevesImages.appendChild(img);
    });
    selectFirstImage("maleSleevesImages", "maleSleevesImage");
  }
  updateSummary();
  updateProgress();
}

document
  .getElementById("maleSleeves")
  .addEventListener("change", updateMaleSleevesImages);

function updateMaleBottomStyleImages() {
  const bottomType = document.getElementById("maleBottomType").value;
  const bottomStyleImages = document.getElementById("maleBottomStyleImages");
  const bottomStyleImageInput = document.getElementById("maleBottomStyleImage");
  bottomStyleImages.innerHTML = "";
  bottomStyleImageInput.value = "";
  const imagePaths = {
    Shalwar: ["images/shalwar/male/style_1.PNG"],
    Trouser: ["images/trouser/male/style_1.PNG"],
  };
  if (bottomType && imagePaths[bottomType]) {
    imagePaths[bottomType].forEach((src, index) => {
      const img = document.createElement("img");
      img.src = src;
      img.alt = `Bottom Style ${index + 1}`;
      img.addEventListener("click", function () {
        bottomStyleImages
          .querySelectorAll("img")
          .forEach((i) => i.classList.remove("selected"));
        this.classList.add("selected");
        bottomStyleImageInput.value = this.src;
        bottomStyleImageInput.dispatchEvent(new Event("change"));
      });
      bottomStyleImages.appendChild(img);
    });
    selectFirstImage("maleBottomStyleImages", "maleBottomStyleImage");
  }
  toggleSection("maleShalwarChart", bottomType === "Shalwar");
  toggleSection("maleTrouserChart", bottomType === "Trouser");
}

document
  .getElementById("maleBottomType")
  .addEventListener("change", updateMaleBottomStyleImages);

function calculateTotalPrice() {
  const activeTab = document.getElementById("activeTab").value;
  let total = 0;

  if (activeTab === "female") {
    const suitType = document.getElementById("suitType").value;
    const suitPrices = {
      "1piece": 1500,
      "2pieceTD": 2000,
      "2pieceTB": 2000,
      "3piece": 2500,
    };
    total += suitPrices[suitType] || 0;

    if (
      document.getElementById("laceYes").checked &&
      document.getElementById("laceSource").value === "library"
    ) {
      const laceImage = document.getElementById("topLaceImage").value;
      const laceImages = document.querySelectorAll("#topLaceImages img");
      let lacePrice = 0;
      laceImages.forEach((img) => {
        if (img.src === laceImage) {
          lacePrice = parseInt(img.getAttribute("data-price")) || 0;
        }
      });
      total += lacePrice;
    }

    if (
      document.getElementById("bottomLaceYes").checked &&
      document.getElementById("bottomLaceSource").value === "library"
    ) {
      const bottomLaceImage = document.getElementById("bottomLaceImage").value;
      const laceImages = document.querySelectorAll("#bottomLaceImages img");
      let bottomLacePrice = 0;
      laceImages.forEach((img) => {
        if (img.src === bottomLaceImage) {
          bottomLacePrice = parseInt(img.getAttribute("data-price")) || 0;
        }
      });
      total += bottomLacePrice;
    }

    if (
      document.getElementById("dupattaLaceYes").checked &&
      document.getElementById("dupattaLaceSource").value === "library"
    ) {
      const dupattaLaceImage =
        document.getElementById("dupattaLaceImage").value;
      const laceImages = document.querySelectorAll("#dupattaLaceImages img");
      let dupattaLacePrice = 0;
      laceImages.forEach((img) => {
        if (img.src === dupattaLaceImage) {
          dupattaLacePrice = parseInt(img.getAttribute("data-price")) || 0;
        }
      });
      total += dupattaLacePrice;
    }
    if (document.getElementById("buttonsYes").checked) {
      const buttonImage = document.getElementById("buttonImage").value;
      const buttonImages = document.querySelectorAll("#buttonImages img");
      let buttonPrice = 0;
      buttonImages.forEach((img) => {
        if (img.src === buttonImage) {
          buttonPrice = parseInt(img.getAttribute("data-price")) || 0;
        }
      });
      total += buttonPrice;
    }
  } else if (activeTab === "male") {
    total += 1500; // Base price for male kurta and bottom
    if (
      document.getElementById("maleButtonsYes").checked &&
      document.getElementById("maleButtonSource").value === "library"
    ) {
      const buttonImage = document.getElementById("maleButtonImage").value;
      const buttonImages = document.querySelectorAll("#maleButtonImages img");
      let buttonPrice = 0;
      buttonImages.forEach((img) => {
        if (img.src === buttonImage) {
          buttonPrice = parseInt(img.getAttribute("data-price")) || 0;
        }
      });
      total += buttonPrice;
    }
    if (document.getElementById("maleSleeves").value === "Cuff") {
      total += 100; // Additional cost for cuff sleeves
    }
  }

  return total;
}
// Add event listeners to update total price on form changes
function setupEventListeners() {
  // Example: Update summary and total price on input changes
  const inputs = document.querySelectorAll(
    "#suitType, #laceYes, #laceNo, #laceSource, #topLaceImage, #bottomLaceYes, #bottomLaceNo, #bottomLaceSource, #bottomLaceImage, #dupattaLaceYes, #dupattaLaceNo, #dupattaLaceSource, #dupattaLaceImage, #buttonsYes, #buttonsNo, #buttonImage, #maleButtonsYes, #maleButtonsNo, #maleButtonSource, #maleButtonImage, #maleSleeves"
  );
  inputs.forEach((input) => {
    input.addEventListener("change", updateSummary);
  });

  // Handle image selections
  const imageContainers = [
    "topLaceImages",
    "bottomLaceImages",
    "dupattaLaceImages",
    "buttonImages",
    "maleButtonImages",
  ];
  imageContainers.forEach((containerId) => {
    const images = document.querySelectorAll(`#${containerId} img`);
    images.forEach((img) => {
      img.addEventListener("click", () => {
        const inputId =
          containerId === "topLaceImages"
            ? "topLaceImage"
            : containerId === "bottomLaceImages"
            ? "bottomLaceImage"
            : containerId === "dupattaLaceImages"
            ? "dupattaLaceImage"
            : containerId === "buttonImages"
            ? "buttonImage"
            : "maleButtonImage";
        document.getElementById(inputId).value = img.src;
        updateSummary();
      });
    });
  });
}

// Call setupEventListeners when the page loads
document.addEventListener("DOMContentLoaded", setupEventListeners);
function updateSummary() {
  const summaryList = document.getElementById("summaryList");
  summaryList.innerHTML = "";
  const activeTab = document.getElementById("activeTab").value;

  if (activeTab === "female") {
    const suitType = document.getElementById("suitType").value;
    const topSize = document.getElementById("topSize").value;
    const style = document.getElementById("style").value;
    const neckStyle = document.getElementById("neckStyle").value;
    const styleImage = document.getElementById("styleImage").value;
    const customTopLength = document.getElementById("customTopLength").value;
    const sleeveLength = document.getElementById("sleeveLength").value;
    const sleeveStyleImage = document.getElementById("sleeveStyleImage").value;
    const customSleeveLength =
      document.getElementById("customSleeveLength").value;
    const damaan = document.getElementById("damaan").value;
    const damaanImage = document.getElementById("damaanImage").value;
    const lace = document.querySelector(
      'input[name="female[lace]"]:checked'
    )?.value;
    const laceSource = document.getElementById("laceSource").value;
    const laceColor = document.getElementById("laceColor").value;
    const laceImage = document.getElementById("topLaceImage").value;
    const lacePosition = document.querySelector(
      'input[name="female[lacePosition][]"]:checked'
    )?.value;
    const buttons = document.querySelector(
      'input[name="female[buttons]"]:checked'
    )?.value;
    const buttonStyle = document.getElementById("buttonStyle").value;
    const buttonImage = document.getElementById("buttonImage").value;
    const buttonStyleImage = document.getElementById("buttonStyleImage").value;
    const bottomType = document.getElementById("bottomType").value;
    const bottomSize = document.getElementById("bottomSize").value;
    const customBottomLength =
      document.getElementById("customBottomLength").value;
    const bottomStyleImage = document.getElementById("bottomStyleImage").value;
    const bottomLace = document.querySelector(
      'input[name="female[bottomLace]"]:checked'
    )?.value;
    const bottomLaceSource = document.getElementById("bottomLaceSource").value;
    const bottomLaceColor = document.getElementById("bottomLaceColor").value;
    const bottomLaceImage = document.getElementById("bottomLaceImage").value;
    const dupattaLace = document.querySelector(
      'input[name="female[dupattaLace]"]:checked'
    )?.value;
    const dupattaLaceSource =
      document.getElementById("dupattaLaceSource").value;
    const dupattaLaceColor = document.getElementById("dupattaLaceColor").value;
    const dupattaLaceImage = document.getElementById("dupattaLaceImage").value;
    const dupattaLacePosition = document.querySelector(
      'input[name="female[dupattaLacePosition]"]:checked'
    )?.value;

    if (suitType) {
      const suitNames = {
        "1piece": "Top Piece",
        "2pieceTD": "Top and Dupatta",
        "2pieceTB": "Top and Bottom",
        "3piece": "Top, Bottom, and Dupatta",
      };
      addSummaryItem("Suit Type", suitNames[suitType] || "Not selected");
    }
    if (topSize) addSummaryItem("Top Size", topSize);
    if (style) addSummaryItem("Style", style);
    if (neckStyle) addSummaryItem("Neck Style", neckStyle);
    if (styleImage)
      addSummaryItem("Neck Style Preview", getImageName(styleImage));
    if (customTopLength)
      addSummaryItem("Custom Top Length", `${customTopLength} inches`);
    if (sleeveLength) addSummaryItem("Sleeve Length", `${sleeveLength} inches`);
    if (sleeveStyleImage)
      addSummaryItem("Sleeve Style Preview", getImageName(sleeveStyleImage));
    if (customSleeveLength)
      addSummaryItem("Custom Sleeve Length", `${customSleeveLength} inches`);
    if (damaan) addSummaryItem("Damaan", damaan);
    if (damaanImage)
      addSummaryItem("Damaan Preview", getImageName(damaanImage));
    if (lace)
      addSummaryItem("Add Lace on Damaan", lace === "yes" ? "Yes" : "No");
    if (lace === "yes") {
      addSummaryItem("Lace Source", laceSource || "Not selected");
      if (laceSource === "library") {
        addSummaryItem("Lace Color", laceColor || "Not selected");
        addSummaryItem("Top Lace Preview", getImageName(laceImage));
      }
      addSummaryItem("Lace Position", lacePosition || "Not selected");
    }
    if (buttons)
      addSummaryItem("Add Buttons", buttons === "yes" ? "Yes" : "No");
    if (buttons === "yes") {
      addSummaryItem("Button Style", buttonStyle || "Not selected");
      addSummaryItem("Button Preview", getImageName(buttonImage));
      addSummaryItem(
        "Button Placket Style Preview",
        getImageName(buttonStyleImage)
      );
    }
    if (bottomType) addSummaryItem("Bottom Type", bottomType);
    if (bottomSize) addSummaryItem("Bottom Size", bottomSize);
    if (customBottomLength)
      addSummaryItem("Custom Bottom Length", `${customBottomLength} inches`);
    if (bottomStyleImage)
      addSummaryItem("Bottom Style Preview", getImageName(bottomStyleImage));
    if (bottomLace)
      addSummaryItem("Add Lace on Bottom", bottomLace === "yes" ? "Yes" : "No");
    if (bottomLace === "yes") {
      addSummaryItem("Bottom Lace Source", bottomLaceSource || "Not selected");
      if (bottomLaceSource === "library") {
        addSummaryItem("Bottom Lace Color", bottomLaceColor || "Not selected");
        addSummaryItem("Bottom Lace Preview", getImageName(bottomLaceImage));
      }
    }
    if (dupattaLace)
      addSummaryItem(
        "Add Lace on Dupatta",
        dupattaLace === "yes" ? "Yes" : "No"
      );
    if (dupattaLace === "yes") {
      addSummaryItem(
        "Dupatta Lace Source",
        dupattaLaceSource || "Not selected"
      );
      if (dupattaLaceSource === "library") {
        addSummaryItem(
          "Dupatta Lace Color",
          dupattaLaceColor || "Not selected"
        );
        addSummaryItem("Dupatta Lace Preview", getImageName(dupattaLaceImage));
      }
      addSummaryItem(
        "Dupatta Lace Position",
        dupattaLacePosition || "Not selected"
      );
    }
  } else if (activeTab === "male") {
    const style = document.getElementById("maleStyle").value;
    const size = document.getElementById("maleSize").value;
    const customTopLength = document.getElementById(
      "maleCustomTopLength"
    ).value;
    const collarStyle = document.getElementById("maleCollarStyle").value;
    const collarImage = document.getElementById("maleCollarImage").value;
    const damaan = document.getElementById("maleDamaan").value;
    const damaanImage = document.getElementById("maleDamaanImage").value;
    const buttons = document.querySelector(
      'input[name="male[buttons]"]:checked'
    )?.value;
    const buttonSource = document.getElementById("maleButtonSource").value;
    const buttonStyle = document.getElementById("maleButtonStyle").value;
    const buttonImage = document.getElementById("maleButtonImage").value;
    const buttonStyleImage = document.getElementById(
      "maleButtonStyleImage"
    ).value;
    const sleeves = document.getElementById("maleSleeves").value;
    const sleevesImage = document.getElementById("maleSleevesImage").value;
    const bottomType = document.getElementById("maleBottomType").value;
    const bottomSize = document.getElementById("maleBottomSize").value;
    const customBottomLength = document.getElementById(
      "maleCustomBottomLength"
    ).value;
    const bottomStyleImage = document.getElementById(
      "maleBottomStyleImage"
    ).value;

    if (style) addSummaryItem("Style", style);
    if (size) addSummaryItem("Size", size);
    if (customTopLength)
      addSummaryItem("Custom Top Length", `${customTopLength} inches`);
    if (collarStyle) addSummaryItem("Collar Style", collarStyle);
    if (collarImage)
      addSummaryItem("Collar Preview", getImageName(collarImage));
    if (damaan) addSummaryItem("Damaan", damaan);
    if (damaanImage)
      addSummaryItem("Damaan Preview", getImageName(damaanImage));
    if (buttons)
      addSummaryItem("Add Buttons", buttons === "yes" ? "Yes" : "No");
    if (buttons === "yes") {
      addSummaryItem("Button Source", buttonSource || "Not selected");
      if (buttonSource === "library") {
        addSummaryItem("Button Preview", getImageName(buttonImage));
      }
      addSummaryItem("Button Style", buttonStyle || "Not selected");
      if (buttonStyle)
        addSummaryItem("Button Style Preview", getImageName(buttonStyleImage));
    }
    if (sleeves) {
      addSummaryItem("Sleeves", sleeves);
      if (sleeves === "Cuff") {
        addSummaryItem(
          "Cuff Sleeves Extra",
          "PKR 100 (includes 2 buttons per sleeve, total 4 buttons)"
        );
      }
    }
    if (sleevesImage)
      addSummaryItem("Sleeves Preview", getImageName(sleevesImage));
    if (bottomType) addSummaryItem("Bottom Type", bottomType);
    if (bottomSize) addSummaryItem("Bottom Size", bottomSize);
    if (customBottomLength)
      addSummaryItem("Custom Bottom Length", `${customBottomLength} inches`);
    if (bottomStyleImage)
      addSummaryItem("Bottom Style Preview", getImageName(bottomStyleImage));
  }

  const totalPrice = calculateTotalPrice();
  document.getElementById(
    "summaryList"
  ).innerHTML += `<div><strong>Total Price: PKR ${totalPrice}</strong></div>`;
  // Set hidden input for total price
  let totalPriceInput = document.getElementById("totalPriceInput");
  if (!totalPriceInput) {
    totalPriceInput = document.createElement("input");
    totalPriceInput.type = "hidden";
    totalPriceInput.id = "totalPriceInput";
    totalPriceInput.name = "totalPrice";
    document.querySelector("form").appendChild(totalPriceInput);
  }
  totalPriceInput.value = totalPrice;
}

function addSummaryItem(name, value) {
  const li = document.createElement("li");
  li.textContent = `${name}: ${value}`;
  document.getElementById("summaryList").appendChild(li);
}

document.querySelectorAll("input, select, textarea").forEach((input) => {
  input.addEventListener("change", () => {
    updateSummary();
    updateProgress();
  });
});

document.querySelectorAll(".nav-tabs .nav-link").forEach((tab) => {
  tab.addEventListener("click", updateActiveTab);
});

document
  .getElementById("customizationForm")
  .addEventListener("submit", function (e) {
    e.preventDefault();
    updateSummary();
    updateProgress();
    alert("Order submitted successfully!");
    this.submit();
  });

window.addEventListener("load", () => {
  populateSleeveStyleImages();
  updateStyleImages();
  updateDamaanImages();
  updateButtonOptions();
  updateButtonStyleImages();
  updateBottomStyleImages();
  updateLaceOptions();
  updateBottomLaceOptions();
  updateDupattaLaceOptions();
  updateMaleCollarImages();
  updateMaleDamaanImages();
  updateMaleButtonOptions();
  updateMaleButtonStyleImages();
  updateMaleSleevesImages();
  updateMaleBottomStyleImages();
  updateActiveTab();
  updateSummary();
  updateProgress();
});
