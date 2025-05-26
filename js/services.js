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
handleButtonGroupClick("buttonTypeGroup", "buttonType");
handleButtonGroupClick("buttonStyleGroup", "buttonStyle");
handleButtonGroupClick("bottomTypeGroup", "bottomType");
handleButtonGroupClick("bottomSizeGroup", "bottomSize");
handleButtonGroupClick("bottomLaceSourceGroup", "bottomLaceSource");
handleButtonGroupClick("dupattaLaceSourceGroup", "dupattaLaceSource");
handleButtonGroupClick("maleStyleGroup", "maleStyle");
handleButtonGroupClick("maleSizeGroup", "maleSize");
handleButtonGroupClick("maleCollarStyleGroup", "maleCollarStyle");
handleButtonGroupClick("maleDamaanGroup", "maleDamaan");
handleButtonGroupClick("maleButtonTypeGroup", "maleButtonType");
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
    "images/sleeves/female/style_3.PNG",
    "images/sleeves/female/style_4.PNG",
    "images/sleeves/female/style_5.PNG",
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
        "images/neck_styles/female/vn_style_5.PNG",
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
        "images/neck_styles/female/cn_style_3.PNG",
        "images/neck_styles/female/cn_style_4.PNG",
        "images/neck_styles/female/cn_style_5.PNG",
      ],
    },
    Kameez: {
      "V-Neck": [
        "images/neck_styles/female/vn_style_1.PNG",
        "images/neck_styles/female/vn_style_2.PNG",
        "images/neck_styles/female/vn_style_3.PNG",
        "images/neck_styles/female/vn_style_4.PNG",
        "images/neck_styles/female/vn_style_5.PNG",
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
        "images/neck_styles/female/cn_style_3.PNG",
        "images/neck_styles/female/cn_style_4.PNG",
        "images/neck_styles/female/cn_style_5.PNG",
      ],
    },
  };
  if (style && neckStyle && imagePaths[style] && imagePaths[style][neckStyle]) {
    imagePaths[style][neckStyle].forEach((src, index) => {
      const img = document.createElement("img");
      img.src = src;
      img.alt = `${style} ${neckStyle} ${index + 1}`;
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

document.getElementById("style").addEventListener("change", function () {
  updateStyleImages();
  updateSummary();
  updateProgress();
});
document.getElementById("neckStyle").addEventListener("change", function () {
  updateStyleImages();
  updateSummary();
  updateProgress();
});

document.getElementById("damaan").addEventListener("change", function () {
  const damaan = this.value;
  const damaanImages = document.getElementById("damaanImages");
  const damaanImageInput = document.getElementById("damaanImage");
  damaanImages.innerHTML = "";
  damaanImageInput.value = "";
  if (damaan) {
    const imageSets = {
      Round: [
        "damaan/female/round_style_1.PNG",
        "damaan/female/round_style_2.PNG",
      ],
      Square: [
        "damaan/female/square_style_1.PNG",
        "damaan/female/square_style_2.PNG",
      ],
    };
    const images = imageSets[damaan] || [];
    images.forEach((imageName, index) => {
      const img = document.createElement("img");
      img.src = `images/${imageName}`;
      img.alt = `${damaan} Damaan ${index + 1}`;
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
  updateSummary();
  updateProgress();
});

function handleLace(
  section,
  laceRadioYes,
  laceRadioNo,
  laceOptions,
  laceSource,
  laceLibraryOptions,
  laceImageInputId
) {
  const options = document.getElementById(laceOptions);
  const libraryOptions = document.getElementById(laceLibraryOptions);
  const laceImageInput = document.getElementById(laceImageInputId);
  const laceSourceSelect = document.getElementById(laceSource);
  const laceColorInput = document.getElementById(`${section}LaceColor`);
  const priceDisplayId = `selectedLacePrice${
    section.charAt(0).toUpperCase() + section.slice(1)
  }`;

  document.getElementById(laceRadioYes).addEventListener("change", function () {
    toggleSection(laceOptions, true, [laceSource]);
    updateSummary();
    updateProgress();
  });

  document.getElementById(laceRadioNo).addEventListener("change", function () {
    toggleSection(laceOptions, false, [laceSource]);
    toggleSection(laceLibraryOptions, false, [laceColorInput?.id]);
    laceImageInput.value = "";
    document.getElementById(priceDisplayId).textContent =
      "Selected Lace Price: PKR 0 per gazz";
    updateSummary();
    updateProgress();
  });

  laceSourceSelect.addEventListener("change", function () {
    const isLibrary = this.value === "library";
    toggleSection(laceLibraryOptions, isLibrary, [laceColorInput?.id]);
    if (!isLibrary) {
      laceImageInput.value = "";
      document.getElementById(priceDisplayId).textContent =
        "Selected Lace Price: PKR 0 per gazz";
    }
    if (isLibrary) {
      const laceImages = document.querySelectorAll(
        `#${laceLibraryOptions} .image-gallery img`
      );
      laceImages.forEach((img) => {
        img.addEventListener("click", function () {
          laceImages.forEach((i) => i.classList.remove("selected"));
          this.classList.add("selected");
          laceImageInput.value = this.src;
          laceImageInput.dispatchEvent(new Event("change"));
          const price = this.getAttribute("data-price") || 0;
          document.getElementById(
            priceDisplayId
          ).textContent = `Selected Lace Price: PKR ${price} per gazz`;
        });
      });
      selectFirstImage(
        laceLibraryOptions.replace("Options", "Images"),
        laceImageInputId
      );
      const firstImage = laceImages[0];
      if (firstImage) {
        const price = firstImage.getAttribute("data-price") || 0;
        document.getElementById(
          priceDisplayId
        ).textContent = `Selected Lace Price: PKR ${price} per gazz`;
      }
    }
    updateSummary();
    updateProgress();
  });
}

handleLace(
  "top",
  "laceYes",
  "laceNo",
  "laceOptions",
  "laceSource",
  "laceLibraryOptions",
  "laceImage"
);
handleLace(
  "bottom",
  "bottomLaceYes",
  "bottomLaceNo",
  "bottomLaceOptions",
  "bottomLaceSource",
  "bottomLaceLibraryOptions",
  "bottomLaceImage"
);
handleLace(
  "dupatta",
  "dupattaLaceYes",
  "dupattaLaceNo",
  "dupattaLaceOptions",
  "dupattaLaceSource",
  "dupattaLaceLibraryOptions",
  "dupattaLaceImage"
);

function handleButtons(
  buttonsYes,
  buttonsNo,
  buttonOptions,
  buttonTypeId,
  buttonStyleId,
  buttonImageId,
  priceDisplayId
) {
  document.getElementById(buttonsYes).addEventListener("change", function () {
    toggleSection(buttonOptions, true, [buttonTypeId, buttonStyleId]);
    updateSummary();
    updateProgress();
  });
  document.getElementById(buttonsNo).addEventListener("change", function () {
    toggleSection(buttonOptions, false, [buttonTypeId, buttonStyleId]);
    document.getElementById(buttonImageId).value = "";
    document.getElementById(priceDisplayId).textContent =
      "Selected Button Type Price: PKR 0";
    updateSummary();
    updateProgress();
  });
}

handleButtons(
  "buttonsYes",
  "buttonsNo",
  "buttonOptions",
  "buttonType",
  "buttonStyle",
  "buttonImage",
  "selectedButtonPrice"
);
handleButtons(
  "maleButtonsYes",
  "maleButtonsNo",
  "maleButtonOptions",
  "maleButtonType",
  "maleButtonStyle",
  "maleButtonImage",
  "selectedMaleButtonPrice"
);

document.getElementById("buttonType").addEventListener("change", function () {
  const buttonType = this.value;
  const buttonImages = document.getElementById("buttonImages");
  const buttonImageInput = document.getElementById("buttonImage");
  buttonImages.innerHTML = "";
  buttonImageInput.value = "";
  if (buttonType) {
    const img = document.createElement("img");
    img.src = `images/${buttonType} Button.jpg`;
    img.alt = `${buttonType} Button`;
    img.addEventListener("click", function () {
      buttonImages
        .querySelectorAll("img")
        .forEach((i) => i.classList.remove("selected"));
      this.classList.add("selected");
      buttonImageInput.value = this.src;
      buttonImageInput.dispatchEvent(new Event("change"));
    });
    buttonImages.appendChild(img);
    selectFirstImage("buttonImages", "buttonImage");
  }
  updateSummary();
  updateProgress();
});

document.querySelectorAll("#buttonTypeGroup .btn").forEach((button) => {
  button.addEventListener("click", function () {
    const price = this.getAttribute("data-price") || 0;
    document.getElementById(
      "selectedButtonPrice"
    ).textContent = `Selected Button Type Price: PKR ${price}`;
    updateSummary();
  });
});

document.getElementById("buttonStyle").addEventListener("change", function () {
  const buttonStyle = this.value;
  const buttonStyleImages = document.getElementById("buttonStyleImages");
  const buttonStyleImageInput = document.getElementById("buttonStyleImage");
  buttonStyleImages.innerHTML = "";
  buttonStyleImageInput.value = "";
  const imagePaths = {
    single: "images/buttons/female/single_placket.PNG",
    double: "images/buttons/female/double_placket.PNG",
  };
  if (buttonStyle && imagePaths[buttonStyle]) {
    const img = document.createElement("img");
    img.src = imagePaths[buttonStyle];
    img.alt = `${buttonStyle} Placket`;
    img.addEventListener("click", function () {
      buttonStyleImages
        .querySelectorAll("img")
        .forEach((i) => i.classList.remove("selected"));
      this.classList.add("selected");
      buttonStyleImageInput.value = this.src;
      buttonStyleImageInput.dispatchEvent(new Event("change"));
    });
    buttonStyleImages.appendChild(img);
    selectFirstImage("buttonStyleImages", "buttonStyleImage");
  }
  updateSummary();
  updateProgress();
});

document.getElementById("bottomType").addEventListener("change", function () {
  const bottomType = this.value;
  const bottomStyleImages = document.getElementById("bottomStyleImages");
  const bottomStyleImageInput = document.getElementById("bottomStyleImage");
  bottomStyleImages.innerHTML = "";
  bottomStyleImageInput.value = "";
  const imagePaths = {
    Shalwar: [
      "images/shalwar/female/style_1.PNG",
      "images/shalwar/female/style_2.PNG",
      "images/shalwar/female/style_3.PNG",
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
      img.alt = `${bottomType} Style ${index + 1}`;
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
  updateSummary();
  updateProgress();
});

document
  .getElementById("maleCollarStyle")
  .addEventListener("change", function () {
    const collarStyle = this.value;
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
        img.alt = `${collarStyle} Collar ${index + 1}`;
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
    updateSummary();
    updateProgress();
  });

document.getElementById("maleDamaan").addEventListener("change", function () {
  const damaan = this.value;
  const damaanImages = document.getElementById("maleDamaanImages");
  const damaanImageInput = document.getElementById("maleDamaanImage");
  damaanImages.innerHTML = "";
  damaanImageInput.value = "";
  if (damaan) {
    const img = document.createElement("img");
    img.src = `images/damaan/male/${damaan}.PNG`;
    img.alt = `${damaan} Damaan`;
    img.addEventListener("click", function () {
      damaanImages
        .querySelectorAll("img")
        .forEach((i) => i.classList.remove("selected"));
      this.classList.add("selected");
      damaanImageInput.value = this.src;
      damaanImageInput.dispatchEvent(new Event("change"));
    });
    damaanImages.appendChild(img);
    selectFirstImage("maleDamaanImages", "maleDamaanImage");
  }
  updateSummary();
  updateProgress();
});

document
  .getElementById("maleButtonType")
  .addEventListener("change", function () {
    const buttonType = this.value;
    const buttonImages = document.getElementById("maleButtonImages");
    const buttonImageInput = document.getElementById("maleButtonImage");
    buttonImages.innerHTML = "";
    buttonImageInput.value = "";
    if (buttonType) {
      const img = document.createElement("img");
      img.src = `images/Male ${buttonType} Button.jpg`;
      img.alt = `${buttonType} Button`;
      img.addEventListener("click", function () {
        buttonImages
          .querySelectorAll("img")
          .forEach((i) => i.classList.remove("selected"));
        this.classList.add("selected");
        buttonImageInput.value = this.src;
        buttonImageInput.dispatchEvent(new Event("change"));
      });
      buttonImages.appendChild(img);
      selectFirstImage("maleButtonImages", "maleButtonImage");
    }
    updateSummary();
    updateProgress();
  });

document.querySelectorAll("#maleButtonTypeGroup .btn").forEach((button) => {
  button.addEventListener("click", function () {
    const price = this.getAttribute("data-price") || 0;
    document.getElementById(
      "selectedMaleButtonPrice"
    ).textContent = `Selected Button Type Price: PKR ${price}`;
    updateSummary();
  });
});

document
  .getElementById("maleButtonStyle")
  .addEventListener("change", function () {
    const buttonStyle = this.value;
    const buttonStyleImages = document.getElementById("maleButtonStyleImages");
    const buttonStyleImageInput = document.getElementById(
      "maleButtonStyleImage"
    );
    buttonStyleImages.innerHTML = "";
    buttonStyleImageInput.value = "";
    const imagePaths = {
      single: "images/buttons/male/single_placket.PNG",
      double: "images/buttons/male/double_placket.PNG",
    };
    if (buttonStyle && imagePaths[buttonStyle]) {
      const img = document.createElement("img");
      img.src = imagePaths[buttonStyle];
      img.alt = `${buttonStyle} Placket`;
      img.addEventListener("click", function () {
        buttonStyleImages
          .querySelectorAll("img")
          .forEach((i) => i.classList.remove("selected"));
        this.classList.add("selected");
        buttonStyleImageInput.value = this.src;
        buttonStyleImageInput.dispatchEvent(new Event("change"));
      });
      buttonStyleImages.appendChild(img);
      selectFirstImage("maleButtonStyleImages", "maleButtonStyleImage");
    }
    updateSummary();
    updateProgress();
  });

document.getElementById("maleSleeves").addEventListener("change", function () {
  const sleeves = this.value;
  const sleevesImages = document.getElementById("maleSleevesImages");
  const sleevesImageInput = document.getElementById("maleSleevesImage");
  sleevesImages.innerHTML = "";
  sleevesImageInput.value = "";
  if (sleeves) {
    const img = document.createElement("img");
    img.src = `images/sleeves/male/${sleeves}.PNG`;
    img.alt = `${sleeves} Sleeves`;
    img.addEventListener("click", function () {
      sleevesImages
        .querySelectorAll("img")
        .forEach((i) => i.classList.remove("selected"));
      this.classList.add("selected");
      sleevesImageInput.value = this.src;
      sleevesImageInput.dispatchEvent(new Event("change"));
    });
    sleevesImages.appendChild(img);
    selectFirstImage("maleSleevesImages", "maleSleevesImage");
  }
  updateSummary();
  updateProgress();
});

document
  .getElementById("maleBottomType")
  .addEventListener("change", function () {
    const bottomType = this.value;
    toggleSection("maleShalwarChart", bottomType === "Shalwar");
    toggleSection("maleTrouserChart", bottomType === "Trouser");
    const bottomStyleImages = document.getElementById("maleBottomStyleImages");
    const bottomStyleImageInput = document.getElementById(
      "maleBottomStyleImage"
    );
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
        img.alt = `${bottomType} Style ${index + 1}`;
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
    updateSummary();
    updateProgress();
  });

document.querySelectorAll(".nav-link").forEach((tab) => {
  tab.addEventListener("shown.bs.tab", function () {
    const activeTab = document.querySelector(".tab-pane.active").id;
    document
      .querySelectorAll('#female [name^="female"], #male [name^="male"]')
      .forEach((field) => {
        field.required = false;
      });
    if (activeTab === "female") {
      ["suitType", "sleeveStyleImage"].forEach((id) => {
        const field = document.getElementById(id);
        if (field) field.required = true;
      });
      document
        .querySelectorAll('#female .section.active [name^="female"]')
        .forEach((field) => {
          field.required = true;
        });
      ["lace", "buttons", "bottomLace", "dupattaLace"].forEach((name) => {
        document
          .querySelectorAll(`input[name="female[${name}]"]`)
          .forEach((radio) => {
            radio.required = true;
          });
      });
    } else if (activeTab === "male") {
      [
        "maleStyle",
        "maleSize",
        "maleCollarStyle",
        "maleDamaan",
        "maleSleeves",
        "maleBottomType",
        "maleBottomSize",
      ].forEach((id) => {
        const field = document.getElementById(id);
        if (field) field.required = true;
      });
      document
        .querySelectorAll('#male .section.active [name^="male"]')
        .forEach((field) => {
          field.required = true;
        });
      ["maleButtons"].forEach((name) => {
        document
          .querySelectorAll(`input[name="male[${name}]"]`)
          .forEach((radio) => {
            radio.required = true;
          });
      });
    }
    [
      "fullName",
      "email",
      "streetAddress",
      "city",
      "postalCode",
      "phone",
    ].forEach((id) => {
      const field = document.getElementById(id);
      if (field) field.required = true;
    });
    updateActiveTab();
    updateSummary();
    updateProgress();
  });
});

function calculateTotalPrice() {
  let totalPrice = 0;
  const activeTab = document.querySelector(".tab-pane.active").id;

  if (activeTab === "female") {
    const suitTypeButton = document.querySelector("#suitTypeGroup .btn.active");
    if (suitTypeButton) {
      totalPrice += parseInt(suitTypeButton.getAttribute("data-price")) || 0;
    }

    const topLace = document.querySelector(
      'input[name="female[lace]"]:checked'
    )?.value;
    if (topLace === "yes") {
      const laceSource = document.getElementById("laceSource").value;
      if (laceSource === "library") {
        const selectedLaceImage = document.querySelector(
          "#laceImages img.selected"
        );
        if (selectedLaceImage) {
          totalPrice +=
            parseInt(selectedLaceImage.getAttribute("data-price")) || 0;
        }
      }
    }

    const buttons = document.querySelector(
      'input[name="female[buttons]"]:checked'
    )?.value;
    if (buttons === "yes") {
      const buttonTypeButton = document.querySelector(
        "#buttonTypeGroup .btn.active"
      );
      if (buttonTypeButton) {
        totalPrice +=
          parseInt(buttonTypeButton.getAttribute("data-price")) || 0;
      }
    }

    const bottomSection = document.getElementById("bottomSection");
    if (bottomSection.classList.contains("active")) {
      const bottomLace = document.querySelector(
        'input[name="female[bottomLace]"]:checked'
      )?.value;
      if (bottomLace === "yes") {
        const bottomLaceSource =
          document.getElementById("bottomLaceSource").value;
        if (bottomLaceSource === "library") {
          const selectedBottomLaceImage = document.querySelector(
            "#bottomLaceImages img.selected"
          );
          if (selectedBottomLaceImage) {
            totalPrice +=
              parseInt(selectedBottomLaceImage.getAttribute("data-price")) || 0;
          }
        }
      }
    }

    const dupattaSection = document.getElementById("dupattaSection");
    if (dupattaSection.classList.contains("active")) {
      const dupattaLace = document.querySelector(
        'input[name="female[dupattaLace]"]:checked'
      )?.value;
      if (dupattaLace === "yes") {
        const dupattaLaceSource =
          document.getElementById("dupattaLaceSource").value;
        if (dupattaLaceSource === "library") {
          const selectedDupattaLaceImage = document.querySelector(
            "#dupattaLaceImages img.selected"
          );
          if (selectedDupattaLaceImage) {
            totalPrice +=
              parseInt(selectedDupattaLaceImage.getAttribute("data-price")) ||
              0;
          }
        }
      }
    }
  } else if (activeTab === "male") {
    totalPrice += 1500; // Fixed stitching price

    const buttons = document.querySelector(
      'input[name="male[buttons]"]:checked'
    )?.value;
    if (buttons === "yes") {
      const buttonTypeButton = document.querySelector(
        "#maleButtonTypeGroup .btn.active"
      );
      if (buttonTypeButton) {
        totalPrice +=
          parseInt(buttonTypeButton.getAttribute("data-price")) || 0;
      }
    }
  }

  return totalPrice;
}

function updateSummary() {
  const summaryList = document.getElementById("summaryList");
  summaryList.innerHTML = "";
  const activeTab = document.querySelector(".tab-pane.active").id;
  if (activeTab === "female") {
    const suitType =
      document.getElementById("suitType").value || "Not selected";
    const topSize = document.getElementById("topSize").value || "Not selected";
    const style = document.getElementById("style").value || "Not selected";
    const neckStyle =
      document.getElementById("neckStyle").value || "Not selected";
    const customTopLength =
      document.getElementById("customTopLength").value || "Not selected";
    const sleeveLength =
      document.getElementById("sleeveLength").value || "Not selected";
    const sleeveStyleImage = getImageName(
      document.getElementById("sleeveStyleImage").value
    );
    const customSleeveLength =
      document.getElementById("customSleeveLength").value || "Not selected";
    const damaan = document.getElementById("damaan").value || "Not selected";
    const damaanImage = getImageName(
      document.getElementById("damaanImage").value
    );
    const lace =
      document.querySelector('input[name="female[lace]"]:checked')?.value ||
      "Not selected";
    let laceDetails = "None";
    if (lace === "yes") {
      const laceSource =
        document.getElementById("laceSource").value || "Not selected";
      const laceColor =
        document.getElementById("laceColor").value || "Not selected";
      const laceImage = getImageName(
        document.getElementById("laceImage").value
      );
      const lacePositions =
        Array.from(
          document.querySelectorAll(
            'input[name="female[lacePosition][]"]:checked'
          )
        )
          .map((input) => input.value)
          .join(", ") || "Not selected";
      laceDetails = `Source: ${laceSource}, Color: ${laceColor}, Image: ${laceImage}, Positions: ${lacePositions}`;
    }
    const buttons =
      document.querySelector('input[name="female[buttons]"]:checked')?.value ||
      "Not selected";
    let buttonDetails = "None";
    let buttonPrice = 0;
    let buttonType = "Not selected";
    if (buttons === "yes") {
      buttonType =
        document.getElementById("buttonType").value || "Not selected";
      const buttonStyle =
        document.getElementById("buttonStyle").value || "Not selected";
      const buttonImage = getImageName(
        document.getElementById("buttonImage").value
      );
      const buttonStyleImage = getImageName(
        document.getElementById("buttonStyleImage").value
      );
      const buttonTypeButton = document.querySelector(
        "#buttonTypeGroup .btn.active"
      );
      buttonPrice = buttonTypeButton
        ? parseInt(buttonTypeButton.getAttribute("data-price")) || 0
        : 0;
      buttonDetails = `Type: ${buttonType}, Style: ${buttonStyle}, Image: ${buttonImage}, Style Image: ${buttonStyleImage}`;
    }
    const bottomType =
      document.getElementById("bottomType").value || "Not selected";
    const bottomSize =
      document.getElementById("bottomSize").value || "Not selected";
    const customBottomLength =
      document.getElementById("customBottomLength").value || "Not selected";
    const bottomStyleImage = getImageName(
      document.getElementById("bottomStyleImage").value
    );
    const bottomLace =
      document.querySelector('input[name="female[bottomLace]"]:checked')
        ?.value || "Not selected";
    let bottomLaceDetails = "None";
    if (bottomLace === "yes") {
      const bottomLaceSource =
        document.getElementById("bottomLaceSource").value || "Not selected";
      const bottomLaceColor =
        document.getElementById("bottomLaceColor").value || "Not selected";
      const bottomLaceImage = getImageName(
        document.getElementById("bottomLaceImage").value
      );
      bottomLaceDetails = `Source: ${bottomLaceSource}, Color: ${bottomLaceColor}, Image: ${bottomLaceImage}`;
    }
    const dupattaLace =
      document.querySelector('input[name="female[dupattaLace]"]:checked')
        ?.value || "Not selected";
    let dupattaLaceDetails = "None";
    if (dupattaLace === "yes") {
      const dupattaLaceSource =
        document.getElementById("dupattaLaceSource").value || "Not selected";
      const dupattaLaceColor =
        document.getElementById("dupattaLaceColor").value || "Not selected";
      const dupattaLaceImage = getImageName(
        document.getElementById("dupattaLaceImage").value
      );
      const dupattaLacePosition =
        document.querySelector(
          'input[name="female[dupattaLacePosition]"]:checked'
        )?.value || "Not selected";
      dupattaLaceDetails = `Source: ${dupattaLaceSource}, Color: ${dupattaLaceColor}, Image: ${dupattaLaceImage}, Position: ${dupattaLacePosition}`;
    }
    const fullName =
      document.getElementById("fullName").value || "Not provided";
    const email = document.getElementById("email").value || "Not provided";
    const streetAddress =
      document.getElementById("streetAddress").value || "Not provided";
    const city = document.getElementById("city").value || "Not provided";
    const postalCode =
      document.getElementById("postalCode").value || "Not provided";
    const phone = document.getElementById("phone").value || "Not provided";
    const suitTypeButton = document.querySelector("#suitTypeGroup .btn.active");
    const suitTypePrice = suitTypeButton
      ? suitTypeButton.getAttribute("data-price")
      : 0;
    const summaryItems = [
      `Suit Type: ${suitType} - PKR ${suitTypePrice}`,
      `Top Size: ${topSize}`,
      `Style: ${style}`,
      `Neck Style: ${neckStyle}`,
      `Custom Top Length: ${customTopLength} inches`,
      `Sleeve Length: ${sleeveLength}`,
      `Sleeve Style Image: ${sleeveStyleImage}`,
      `Custom Sleeve Length: ${customSleeveLength} inches`,
      `Damaan: ${damaan}`,
      `Damaan Image: ${damaanImage}`,
      `Lace: ${lace} (${laceDetails})`,
    ];

    if (lace === "yes" && laceSource === "library") {
      const selectedLaceImage = document.querySelector(
        "#laceImages img.selected"
      );
      if (selectedLaceImage) {
        const lacePrice = selectedLaceImage.getAttribute("data-price");
        summaryItems.push(`Top Lace: ${laceImage} - PKR ${lacePrice} per gazz`);
      }
    }

    if (buttons === "yes") {
      summaryItems.push(
        `Buttons: ${buttonType} - PKR ${buttonPrice} (${buttonDetails})`
      );
    } else {
      summaryItems.push(`Buttons: None`);
    }

    summaryItems.push(
      `Bottom Type: ${bottomType}`,
      `Bottom Size: ${bottomSize}`,
      `Custom Bottom Length: ${customBottomLength} inches`,
      `Bottom Style Image: ${bottomStyleImage}`,
      `Bottom Lace: ${bottomLace} (${bottomLaceDetails})`
    );

    if (bottomLace === "yes" && bottomLaceSource === "library") {
      const selectedBottomLaceImage = document.querySelector(
        "#bottomLaceImages img.selected"
      );
      if (selectedBottomLaceImage) {
        const bottomLacePrice =
          selectedBottomLaceImage.getAttribute("data-price");
        summaryItems.push(
          `Bottom Lace: ${bottomLaceImage} - PKR ${bottomLacePrice} per gazz`
        );
      }
    }

    summaryItems.push(`Dupatta Lace: ${dupattaLace} (${dupattaLaceDetails})`);
    if (dupattaLace === "yes" && dupattaLaceSource === "library") {
      const selectedDupattaLaceImage = document.querySelector(
        "#dupattaLaceImages img.selected"
      );
      if (selectedDupattaLaceImage) {
        const dupattaLacePrice =
          selectedDupattaLaceImage.getAttribute("data-price");
        summaryItems.push(
          `Dupatta Lace: ${dupattaLaceImage} - PKR ${dupattaLacePrice} per gazz`
        );
      }
    }

    summaryItems.push(
      `Full Name: ${fullName}`,
      `Email: ${email}`,
      `Street Address: ${streetAddress}`,
      `City: ${city}`,
      `Postal Code: ${postalCode}`,
      `Phone: ${phone}`
    );

    summaryItems.forEach((item) => {
      const li = document.createElement("li");
      li.textContent = item;
      summaryList.appendChild(li);
    });

    const laceSections = [
      { radioName: "lace", sourceId: "laceSource" },
      { radioName: "bottomLace", sourceId: "bottomLaceSource" },
      { radioName: "dupattaLace", sourceId: "dupattaLaceSource" },
    ];
    const laceSelected = laceSections.some(({ radioName, sourceId }) => {
      const lace = document.querySelector(
        `input[name="female[${radioName}]"]:checked`
      )?.value;
      const source = document.getElementById(sourceId).value;
      return lace === "yes" && source === "library";
    });
    if (laceSelected) {
      const disclaimerLi = document.createElement("li");
      disclaimerLi.textContent =
        "Note: Lace prices are per gazz. The total price is estimated based on standard usage.";
      summaryList.appendChild(disclaimerLi);
    }
  } else if (activeTab === "male") {
    const style = document.getElementById("maleStyle").value || "Not selected";
    const size = document.getElementById("maleSize").value || "Not selected";
    const customTopLength =
      document.getElementById("maleCustomTopLength").value || "Not selected";
    const collarStyle =
      document.getElementById("maleCollarStyle").value || "Not selected";
    const collarImage = getImageName(
      document.getElementById("maleCollarImage").value
    );
    const damaan =
      document.getElementById("maleDamaan").value || "Not selected";
    const damaanImage = getImageName(
      document.getElementById("maleDamaanImage").value
    );
    const buttons =
      document.querySelector('input[name="male[buttons]"]:checked')?.value ||
      "Not selected";
    let buttonDetails = "None";
    if (buttons === "yes") {
      const buttonType =
        document.getElementById("maleButtonType").value || "Not selected";
      const buttonStyle =
        document.getElementById("maleButtonStyle").value || "Not selected";
      const buttonImage = getImageName(
        document.getElementById("maleButtonImage").value
      );
      const buttonStyleImage = getImageName(
        document.getElementById("maleButtonStyleImage").value
      );
      buttonDetails = `Type: ${buttonType}, Style: ${buttonStyle}, Image: ${buttonImage}, Style Image: ${buttonStyleImage}`;
    }
    const sleeves =
      document.getElementById("maleSleeves").value || "Not selected";
    const sleevesImage = getImageName(
      document.getElementById("maleSleevesImage").value
    );
    const bottomType =
      document.getElementById("maleBottomType").value || "Not selected";
    const bottomSize =
      document.getElementById("maleBottomSize").value || "Not selected";
    const customBottomLength =
      document.getElementById("maleCustomBottomLength").value || "Not selected";
    const bottomStyleImage = getImageName(
      document.getElementById("maleBottomStyleImage").value
    );
    const fullName =
      document.getElementById("fullName").value || "Not provided";
    const email = document.getElementById("email").value || "Not provided";
    const streetAddress =
      document.getElementById("streetAddress").value || "Not provided";
    const city = document.getElementById("city").value || "Not provided";
    const postalCode =
      document.getElementById("postalCode").value || "Not provided";
    const phone = document.getElementById("phone").value || "Not provided";
    const summaryItems = [
      `Style: ${style}`,
      `Size: ${size}`,
      `Custom Top Length: ${customTopLength} inches`,
      `Collar Style: ${collarStyle}`,
      `Collar Image: ${collarImage}`,
      `Damaan: ${damaan}`,
      `Damaan Image: ${damaanImage}`,
      `Sleeves: ${sleeves}`,
      `Sleeves Image: ${sleevesImage}`,
      `Bottom Type: ${bottomType}`,
      `Bottom Size: ${bottomSize}`,
      `Custom Bottom Length: ${customBottomLength} inches`,
      `Bottom Style Image: ${bottomStyleImage}`,
      `Stitching: PKR 1500`,
      `Buttons: ${buttons} (${buttonDetails})`,
    ];

    if (buttons === "yes") {
      const buttonTypeButton = document.querySelector(
        "#maleButtonTypeGroup .btn.active"
      );
      if (buttonTypeButton) {
        const buttonPrice = buttonTypeButton.getAttribute("data-price");
        summaryItems.push(`Buttons: ${buttonType} - PKR ${buttonPrice}`);
      }
    }

    summaryItems.forEach((item) => {
      const li = document.createElement("li");
      li.textContent = item;
      summaryList.appendChild(li);
    });
  }
  const totalPrice = calculateTotalPrice();
  const totalLi = document.createElement("li");
  totalLi.innerHTML = `<strong>Total Price: PKR ${totalPrice} <br>(Estimated. Final amount will be confirmed via call.)</strong>`;

  summaryList.appendChild(totalLi);
}

document.querySelectorAll("input, select, textarea").forEach((element) => {
  element.addEventListener("change", function () {
    updateSummary();
    updateProgress();
  });
  element.addEventListener("input", function () {
    updateSummary();
    updateProgress();
  });
});

document.addEventListener("DOMContentLoaded", function () {
  document
    .querySelectorAll('#female [name^="female"], #male [name^="male"]')
    .forEach((field) => {
      field.required = false;
    });
  ["fullName", "email", "streetAddress", "city", "postalCode", "phone"].forEach(
    (id) => {
      const field = document.getElementById(id);
      if (field) field.required = true;
    }
  );
  const activeTab = document.querySelector(".tab-pane.active").id;
  if (activeTab === "female") {
    document.getElementById("suitType").required = true;
    document.getElementById("laceNo").required = true;
    document.getElementById("buttonsNo").required = true;
    document.getElementById("sleeveStyleImage").required = true;
  }
  populateSleeveStyleImages();
  updateActiveTab();
  updateSummary();
  updateProgress();
});

document.addEventListener("DOMContentLoaded", function () {
  const urlParams = new URLSearchParams(window.location.search);
  const status = urlParams.get("status");
  const message = urlParams.get("message");
  if (status === "success") {
    alert(
      "Order submitted successfully! You will receive a confirmation email soon."
    );
  } else if (status === "error" && message) {
    alert("Error: " + decodeURIComponent(message));
  }
});
