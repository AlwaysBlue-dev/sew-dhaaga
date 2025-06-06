<?php
$pageTitle = "Services - Sew Dhaaga";
$customCss = "services.css";
include 'header.php';
?>

<div class="container-fluid my-5">
    <div class="d-flex justify-content-center mt-5 mb-4">
        <h1 style="color:#f8c2d0; font-weight: 600; margin-top: 100px; text-align: center;">
            Click. Design. Slay
        </h1>
    </div>

    <form id="customizationForm" action="send_email.php" method="POST">
        <input type="hidden" id="activeTab" name="activeTab" value="female">
        <div class="progress-bar-container">
            <div class="progress-bar">
                <div class="progress-bar-fill" style="width: 0%"></div>
            </div>
        </div>
        <p class="disclaimer text-center mt-2" style="color: #ff4d4d; font-weight: 500;">
            Please select only one tab (Female or Male) for your order. The order summary will reflect data from the active tab only.
        </p>

        <ul class="nav nav-tabs justify-content-center" id="genderTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="female-tab" data-bs-toggle="tab" data-bs-target="#female" type="button" role="tab" aria-controls="female" aria-selected="true">
                    Female
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="male-tab" data-bs-toggle="tab" data-bs-target="#male" type="button" role="tab" aria-controls="male" aria-selected="false">
                    Male
                </button>
            </li>
        </ul>

        <div class="tab-content" id="genderTabContent">
            <div class="tab-pane fade show active" id="female" role="tabpanel" aria-labelledby="female-tab">
                <div class="mt-4">
                    <div class="card">
                        <h3 style="color: #20c997;">Female Clothing Customization</h3>
                        <div class="mb-3">
                            <label for="suitType" class="form-label">Select Suit Type:<span class="required-asterisk">*</span></label>
                            <div id="suitTypeGroup" class="row btn-group" role="group" aria-label="Suit Type">
                                <div class="col-lg-3 col-md-6 mb-2">
                                    <button type="button" class="btn btn-outline-primary w-100 text-start" data-value="1piece" data-price="1500">
                                        <img src="images/1-piece.PNG" class="img-fluid mb-2" alt="1 Piece" style="max-height:80px;">
                                        <div>1 Piece (Top)<br>PKR 1500</div>
                                    </button>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-2">
                                    <button type="button" class="btn btn-outline-primary w-100 text-start" data-value="2pieceTD" data-price="2000">
                                        <img src="images/1-piece.PNG" class="img-fluid mb-2" alt="2 Piece TD" style="max-height:80px;">
                                        <img src="images/dupatta.png" class="img-fluid mb-2" alt="2 Piece TD" style="max-height:40px;">
                                        <div>2 Piece (Top and Dupatta)<br>PKR 2000</div>
                                    </button>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-2">
                                    <button type="button" class="btn btn-outline-primary w-100 text-start" data-value="2pieceTB" data-price="2000">
                                        <img src="images/1-piece.PNG" class="img-fluid mb-2" alt="2 Piece TB" style="max-height:80px;">
                                        <img src="images/shalwar/male/style_1.PNG" class="img-fluid mb-2" alt="2 Piece TB" style="max-height:80px;">
                                        <div>2 Piece (Top and Bottom)<br>PKR 2000</div>
                                    </button>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-2">
                                    <button type="button" class="btn btn-outline-primary w-100 text-start" data-value="3piece" data-price="2500">
                                        <img src="images/3-piece.PNG" class="img-fluid mb-2" alt="3 Piece" style="max-height:80px;">
                                        <div>3 Piece (Top, Bottom, Dupatta)<br>PKR 2500</div>
                                    </button>
                                </div>
                            </div>


                            <input type="hidden" id="suitType" name="female[suitType]" value="">
                            <p class="disclaimer mt-2">Disclaimer: These are base prices. Total price will be calculated at checkout.</p>
                        </div>
                    </div>
                    <div id="topSection" class="section card">
                        <h4>Top Section</h4>
                        <div class="mb-3">
                            <label for="topSize" class="form-label">Select Size:<span class="required-asterisk">*</span></label>
                            <div id="topSizeGroup" class="btn-group" role="group" aria-label="Top Size">
                                <button type="button" class="btn btn-outline-primary" data-value="6">6</button>
                                <button type="button" class="btn btn-outline-primary" data-value="8">8</button>
                                <button type="button" class="btn btn-outline-primary" data-value="10">10</button>
                                <button type="button" class="btn btn-outline-primary" data-value="12">12</button>
                                <button type="button" class="btn btn-outline-primary" data-value="14">14</button>
                                <button type="button" class="btn btn-outline-primary" data-value="16">16</button>
                            </div>
                            <input type="hidden" id="topSize" name="female[topSize]" value="">
                        </div>
                        <table class="table table-bordered mb-3">
                            <thead>
                                <tr>
                                    <th>SIZE</th>
                                    <th>SHOULDER</th>
                                    <th>CHEST/BUST</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>6</td>
                                    <td>14</td>
                                    <td>19</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>14.5</td>
                                    <td>20</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>15</td>
                                    <td>21</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>15.5</td>
                                    <td>22</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>16</td>
                                    <td>24</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td>17</td>
                                    <td>26</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mb-3">
                            <label for="style" class="form-label">Select Style:<span class="required-asterisk">*</span></label>
                            <div id="styleGroup" class="btn-group" role="group" aria-label="Style">
                                <button type="button" class="btn btn-outline-primary" data-value="Kurta">Kurta</button>
                                <button type="button" class="btn btn-outline-primary" data-value="Kameez">Kameez</button>
                            </div>
                            <input type="hidden" id="style" name="female[style]" value="">
                        </div>
                        <input type="hidden" id="styleImage" name="female[styleImage]">
                        <div class="mb-3">
                            <label for="neckStyle" class="form-label">Select Neck Style:<span class="required-asterisk">*</span></label>
                            <div id="neckStyleGroup" class="btn-group" role="group" aria-label="Neck Style">
                                <button type="button" class="btn btn-outline-primary" data-value="V-Neck">V-Neck</button>
                                <button type="button" class="btn btn-outline-primary" data-value="Collar">Boat Neckline</button>
                                <button type="button" class="btn btn-outline-primary" data-value="Round">Round-Neck</button>
                            </div>
                            <div class="image-gallery mb-3" id="styleImages"></div>
                            <input type="hidden" id="neckStyle" name="female[neckStyle]" value="">
                        </div>
                        <div class="mb-3">
                            <label for="customTopLength" class="form-label">Custom Top Length (inches): (optional)</label>
                            <input type="number" class="form-control" id="customTopLength" name="female[customTopLength]" placeholder="e.g., 34">
                            <small class="form-text text-muted">Example: Standard size for 5'3 top is 34 inches (above the knee).</small>
                        </div>
                        <div class="mb-3">
                            <label for="sleeveLength" class="form-label">Select Sleeve Length:<span class="required-asterisk">*</span></label>
                            <div id="sleeveLengthGroup" class="btn-group" role="group" aria-label="Sleeve Length">
                            </div>
                            <input type="hidden" id="sleeveLength" name="female[sleeveLength]" value="">
                        </div>
                        <div class="mb-3">
                            <label for="sleeveStyle" class="form-label">Select Sleeve Style:<span class="required-asterisk">*</span></label>
                            <div class="image-gallery mb-3" id="sleeveStyleImages"></div>
                            <input type="hidden" id="sleeveStyleImage" name="female[sleeveStyleImage]" required>
                        </div>
                        <div class="mb-3">
                            <label for="customSleeveLength" class="form-label">Custom Sleeve Length (inches): (optional)</label>
                            <input type="number" class="form-control" id="customSleeveLength" name="female[customSleeveLength]" placeholder="e.g., 20">
                            <small class="form-text text-muted">Enter custom sleeve length if different from selected sleeve length.</small>
                        </div>
                        <div class="mb-3">
                            <label for="damaan" class="form-label">Select Damaan:<span class="required-asterisk">*</span></label>
                            <div id="damaanGroup" class="btn-group" role="group" aria-label="Damaan">
                                <button type="button" class="btn btn-outline-primary" data-value="Round">Round Damaan</button>
                                <button type="button" class="btn btn-outline-primary" data-value="Square">Square Damaan</button>
                            </div>
                            <input type="hidden" id="damaan" name="female[damaan]" value="">
                        </div>
                        <div class="image-gallery mb-3" id="damaanImages"></div>
                        <input type="hidden" id="damaanImage" name="female[damaanImage]">
                        <div class="mb-3">
                            <label class="form-label">Do you want to add lace on Damaan?<span class="required-asterisk">*</span></label>
                            <p class="disclaimer" style="color: #555; font-style: italic;">Disclaimer: Lace prices are per gazz. The total price is estimated based on standard usage via call.</p>
                            <div>
                                <input type="radio" class="form-check-input" name="female[lace]" id="laceYes" value="yes">
                                <label for="laceYes" class="form-check-label">Yes</label>
                                <input type="radio" class="form-check-input" name="female[lace]" id="laceNo" value="no" checked>
                                <label for="laceNo" class="form-check-label">No</label>
                            </div>
                        </div>
                        <div id="laceOptions" class="section">
                            <div class="mb-3">
                                <label class="form-label">Lace Source:<span class="required-asterisk">*</span></label>
                                <div id="laceSourceGroup" class="btn-group" role="group" aria-label="Lace Source">
                                    <button type="button" class="btn btn-outline-primary" data-value="own">I will provide my own</button>
                                    <button type="button" class="btn btn-outline-primary" data-value="library">I want to select from the lace library</button>
                                </div>
                                <input type="hidden" id="laceSource" name="female[laceSource]" value="">
                            </div>
                            <div id="laceLibraryOptions" class="section">
                                <div class="mb-3">
                                    <label for="laceColor" class="form-label">Select Lace Color:<span class="required-asterisk">*</span></label>
                                    <input type="text" class="form-control" id="laceColor" name="female[laceColor]" placeholder="e.g., Red">
                                </div>
                                <p id="selectedLacePriceTop">Selected Lace Price: PKR 0 per gazz</p>
                                <div class="container image-gallery mb-3" id="topLaceImages">
                                    <div class="row">
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_1.jpg" alt="Beil Style 1" data-price="170" class="img-fluid">
                                            <p>PKR 170 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_2.jpg" alt="Beil Style 2" data-price="220" class="img-fluid">
                                            <p>PKR 220 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_3.jpg" alt "Beil Style 3" data-price="170" class="img-fluid">
                                            <p>PKR 170 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_4.jpg" alt="Beil Style 4" data-price="270" class="img-fluid">
                                            <p>PKR 270 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_5.jpg" alt="Beil Style 5" data-price="170" class="img-fluid">
                                            <p>PKR 170 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_6.jpg" alt="Beil Style 6" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_7.jpg" alt="Beil Style 7" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_8.jpg" alt="Beil Style 8" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_9.jpg" alt="Beil Style 9" data-price="170" class="img-fluid">
                                            <p>PKR 170 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_10.jpg" alt="Beil Style 10" data-price="150" class="img-fluid">
                                            <p>PKR 150 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_11.jpg" alt="Beil Style 11" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_12.jpg" alt="Beil Style 12" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_13.jpg" alt="Beil Style 13" data-price="150" class="img-fluid">
                                            <p>PKR 150 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_14.jpg" alt="Beil Style 14" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_15.jpg" alt="Beil Style 15" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_16.jpg" alt="Beil Style 16" data-price="150" class="img-fluid">
                                            <p>PKR 150 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_17.jpg" alt="Beil Style 17" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="topLaceImage" name="female[laceImage]">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Where to add lace:<span class="required-asterisk">*</span></label>
                                <div>
                                    <input type="radio" class="form-check-input" id="laceFront" name="female[lacePosition][]" value="Front">
                                    <label for="laceFront" class="form-check-label">Front</label>
                                    <input type="radio" class="form-check-input" id="laceBack" name="female[lacePosition][]" value="Back">
                                    <label for="laceBack" class="form-check-label">Back</label>
                                    <input type="radio" class="form-check-input" id="laceFrontBack" name="female[lacePosition][]" value="Front Back (Both)">
                                    <label for="laceFrontBack" class="form-check-label">Front Back (Both)</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Do you want to add Fabric covered button?<span class="required-asterisk">*</span></label>
                            <div>
                                <input type="radio" class="form-check-input" name="female[buttons]" id="buttonsYes" value="yes">
                                <label for="buttonsYes" class="form-check-label">Yes</label>
                                <input type="radio" class="form-check-input" name="female[buttons]" id="buttonsNo" value="no" checked>
                                <label for="buttonsNo" class="form-check-label">No</label>
                            </div>
                        </div>
                        <div id="buttonOptions" class="section">
                            <div class="mb-3">
                                <label class="form-label">Select Fabric Covered Button Style:<span class="required-asterisk">*</span></label>
                                <div class="image-gallery mb-3" id="buttonImages">
                                    <div class="row">
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/buttons/female/style_1.jpg" alt="Button Style 1" data-price="25" class="img-fluid">
                                            <p>PKR 25</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/buttons/female/style_2.jpg" alt="Button Style 2" data-price="25" class="img-fluid">
                                            <p>PKR 25</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/buttons/female/style_3.jpg" alt="Button Style 3" data-price="25" class="img-fluid">
                                            <p>PKR 25</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/buttons/female/style_4.jpg" alt="Button Style 4" data-price="25" class="img-fluid">
                                            <p>PKR 25</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/buttons/female/style_5.jpg" alt="Button Style 5" data-price="25" class="img-fluid">
                                            <p>PKR 25</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/buttons/female/style_6.jpg" alt="Button Style 6" data-price="25" class="img-fluid">
                                            <p>PKR 25</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/buttons/female/style_7.jpg" alt="Button Style 7" data-price="25" class="img-fluid">
                                            <p>PKR 25</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/buttons/female/style_8.jpg" alt="Button Style 8" data-price="25" class="img-fluid">
                                            <p>PKR 25</p>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="buttonImage" name="female[buttonImage]">
                            </div>
                            <div class="mb-3">
                                <label for="buttonStyle" class="form-label">Select Button Style:<span class="required-asterisk">*</span></label>
                                <div id="buttonStyleGroup" class="btn-group" role="group" aria-label="Button Style">
                                    <button type="button" class="btn btn-outline-primary" data-value="double">Double Placket</button>
                                    <button type="button" class="btn btn-outline-primary" data-value="single">Single Placket</button>
                                </div>
                                <div>
                                    <p class="disclaimer mt-2">Disclaimer: Double Placket include four buttons for an additional of PKR 100.</p>
                                </div>

                                <input type="hidden" id="buttonStyle" name="female[buttonStyle]" value="">
                            </div>
                            <div class="image-gallery mb-3" id="buttonStyleImages"></div>
                            <input type="hidden" id="buttonStyleImage" name="female[buttonStyleImage]">
                        </div>
                    </div>
                    <div id="bottomSection" class="section card">
                        <h4>Bottom Section</h4>
                        <div class="mb-3">
                            <label for="bottomType" class="form-label">Select Bottom:<span class="required-asterisk">*</span></label>
                            <div id="bottomTypeGroup" class="btn-group" role="group" aria-label="Bottom Type">
                                <button type="button" class="btn btn-outline-primary" data-value="Shalwar">Shalwar</button>
                                <button type="button" class="btn btn-outline-primary" data-value="Trouser">Trouser</button>
                            </div>
                            <input type="hidden" id="bottomType" name="female[bottomType]" value="">
                        </div>
                        <div class="image-gallery mb-3" id="bottomStyleImages"></div>
                        <div class="mb-3">
                            <label for="bottomSize" class="form-label">Select Bottom Size:<span class="required-asterisk">*</span></label>
                            <div id="bottomSizeGroup" class="btn-group" role="group" aria-label="Bottom Size">
                                <button type="button" class="btn btn-outline-primary" data-value="8">8</button>
                                <button type="button" class="btn btn-outline-primary" data-value="10">10</button>
                                <button type="button" class="btn btn-outline-primary" data-value="12">12</button>
                                <button type="button" class="btn btn-outline-primary" data-value="14">14</button>
                                <button type="button" class="btn btn-outline-primary" data-value="16">16</button>
                            </div>
                            <input type="hidden" id="bottomSize" name="female[bottomSize]" value="">
                        </div>
                        <table class="table table-bordered mb-3">
                            <thead>
                                <tr>
                                    <th>SIZE</th>
                                    <th>WAIST</th>
                                    <th>HIP</th>
                                    <th>THIGH</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>8</td>
                                    <td>26.5</td>
                                    <td>20</td>
                                    <td>12</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>28</td>
                                    <td>21</td>
                                    <td>12.5</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>29.5</td>
                                    <td>22</td>
                                    <td>13</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>31</td>
                                    <td>23</td>
                                    <td>13.5</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td>32.5</td>
                                    <td>24</td>
                                    <td>14</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mb-3">
                            <label for="customBottomLength" class="form-label">Custom Bottom Length (inches): (optional)</label>
                            <input type="number" class="form-control" id="customBottomLength" name="female[customBottomLength]" placeholder="e.g., 38">
                        </div>

                        <input type="hidden" id="bottomStyleImage" name="female[bottomStyleImage]">
                        <div class="mb-3">
                            <label class="form-label">Do you want to add lace?<span class="required-asterisk">*</span></label>
                            <p class="disclaimer" style="color: #555; font-style: italic;">Disclaimer: Lace prices are per gazz. The total price is estimated based on standard usage via call.</p>
                            <div>
                                <input type="radio" class="form-check-input" name="female[bottomLace]" id="bottomLaceYes" value="yes">
                                <label for="bottomLaceYes" class="form-check-label">Yes</label>
                                <input type="radio" class="form-check-input" name="female[bottomLace]" id="bottomLaceNo" value="no" checked>
                                <label for="bottomLaceNo" class="form-check-label">No</label>
                            </div>
                        </div>
                        <div id="bottomLaceOptions" class="section">
                            <div class="mb-3">
                                <label class="form-label">Lace Source:<span class="required-asterisk">*</span></label>
                                <div id="bottomLaceSourceGroup" class="btn-group" role="group" aria-label="Bottom Lace Source">
                                    <button type="button" class="btn btn-outline-primary" data-value="own">I will provide my own</button>
                                    <button type="button" class="btn btn-outline-primary" data-value="library">I want to select from the lace library</button>
                                </div>
                                <input type="hidden" id="bottomLaceSource" name="female[bottomLaceSource]" value="">
                            </div>
                            <div id="bottomLaceLibraryOptions" class="section">
                                <div class="mb-3">
                                    <label for="bottomLaceColor" class="form-label">Select Lace Color:<span class="required-asterisk">*</span></label>
                                    <input type="text" class="form-control" id="bottomLaceColor" name="female[bottomLaceColor]" placeholder="e.g., Red">
                                </div>
                                <p id="selectedLacePriceBottom">Selected Lace Price: PKR 0 per gazz</p>
                                <div class="container image-gallery mb-3" id="bottomLaceImages">
                                    <div class="row">
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_1.jpg" alt="Beil Style 1" data-price="170" class="img-fluid">
                                            <p>PKR 170 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_2.jpg" alt="Beil Style 2" data-price="220" class="img-fluid">
                                            <p>PKR 220 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_3.jpg" alt="Beil Style 3" data-price="170" class="img-fluid">
                                            <p>PKR 170 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_4.jpg" alt="Beil Style 4" data-price="270" class="img-fluid">
                                            <p>PKR 270 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_5.jpg" alt="Beil Style 5" data-price="170" class="img-fluid">
                                            <p>PKR 170 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_6.jpg" alt="Beil Style 6" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_7.jpg" alt="Beil Style 7" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_8.jpg" alt="Beil Style 8" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_9.jpg" alt="Beil Style 9" data-price="170" class="img-fluid">
                                            <p>PKR 170 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_10.jpg" alt="Beil Style 10" data-price="150" class="img-fluid">
                                            <p>PKR 150 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_11.jpg" alt="Beil Style 11" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_12.jpg" alt="Beil Style 12" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_13.jpg" alt="Beil Style 13" data-price="150" class="img-fluid">
                                            <p>PKR 150 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_14.jpg" alt="Beil Style 14" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_15.jpg" alt="Beil Style 15" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_16.jpg" alt="Beil Style 16" data-price="150" class="img-fluid">
                                            <p>PKR 150 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_17.jpg" alt="Beil Style 17" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="bottomLaceImage" name="female[bottomLaceImage]">
                            </div>
                        </div>
                    </div>
                    <div id="dupattaSection" class="section card">
                        <h4>Dupatta Section</h4>
                        <div class="mb-3">
                            <label class="form-label">Do you want to add lace on your dupatta?<span class="required-asterisk">*</span></label>
                            <p class="disclaimer" style="color: #555; font-style: italic;">Disclaimer: Lace prices are per gazz. The total price is estimated based on standard usage via call.</p>
                            <div>
                                <input type="radio" class="form-check-input" name="female[dupattaLace]" id="dupattaLaceYes" value="yes">
                                <label for="dupattaLaceYes" class="form-check-label">Yes</label>
                                <input type="radio" class="form-check-input" name="female[dupattaLace]" id="dupattaLaceNo" value="no" checked>
                                <label for="dupattaLaceNo" class="form-check-label">No</label>
                            </div>
                        </div>
                        <div id="dupattaLaceOptions" class="section">
                            <div class="mb-3">
                                <label class="form-label">Lace Source:<span class="required-asterisk">*</span></label>
                                <div id="dupattaLaceSourceGroup" class="btn-group" role="group" aria-label="Dupatta Lace Source">
                                    <button type="button" class="btn btn-outline-primary" data-value="own">I will provide my own</button>
                                    <button type="button" class="btn btn-outline-primary" data-value="library">I want to select from the lace library</button>
                                </div>
                                <input type="hidden" id="dupattaLaceSource" name="female[dupattaLaceSource]" value="">
                            </div>
                            <div id="dupattaLaceLibraryOptions" class="section">
                                <div class="mb-3">
                                    <label for="dupattaLaceColor" class="form-label">Select Lace Color:<span class="required-asterisk">*</span></label>
                                    <input type="text" class="form-control" id="dupattaLaceColor" name="female[dupattaLaceColor]" placeholder="e.g., Red">
                                </div>
                                <p id="selectedLacePriceDupatta">Selected Lace Price: PKR 0 per gazz</p>
                                <div class="container image-gallery mb-3" id="dupattaLaceImages">
                                    <div class="row">
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_1.jpg" alt="Beil Style 1" data-price="170" class="img-fluid">
                                            <p>PKR 170 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_2.jpg" alt="Beil Style 2" data-price="220" class="img-fluid">
                                            <p>PKR 220 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_3.jpg" alt="Beil Style 3" data-price="170" class="img-fluid">
                                            <p>PKR 170 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_4.jpg" alt="Beil Style 4" data-price="270" class="img-fluid">
                                            <p>PKR 270 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_5.jpg" alt="Beil Style 5" data-price="170" class="img-fluid">
                                            <p>PKR 170 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_6.jpg" alt="Beil Style 6" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_7.jpg" alt="Beil Style 7" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_8.jpg" alt="Beil Style 8" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_9.jpg" alt="Beil Style 9" data-price="170" class="img-fluid">
                                            <p>PKR 170 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_10.jpg" alt="Beil Style 10" data-price="150" class="img-fluid">
                                            <p>PKR 150 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_11.jpg" alt="Beil Style 11" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_12.jpg" alt="Beil Style 12" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_13.jpg" alt="Beil Style 13" data-price="150" class="img-fluid">
                                            <p>PKR 150 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_14.jpg" alt="Beil Style 14" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_15.jpg" alt="Beil Style 15" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_16.jpg" alt="Beil Style 16" data-price="150" class="img-fluid">
                                            <p>PKR 150 per gazz</p>
                                        </div>
                                        <div class="col-md-2 text-center mb-4">
                                            <img src="images/beil-styles/style_17.jpg" alt="Beil Style 17" data-price="120" class="img-fluid">
                                            <p>PKR 120 per gazz</p>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="dupattaLaceImage" name="female[dupattaLaceImage]">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Where to add lace:<span class="required-asterisk">*</span></label>
                                <div>
                                    <input type="radio" class="form-check-input" name="female[dupattaLacePosition]"
                                        id="dupattaLacePallu" value="pallu" onchange="toggleDupattaImage(this.value)">
                                    <label for="dupattaLacePallu" class="form-check-label me-3">Only on Pallu</label>

                                    <input type="radio" class="form-check-input" name="female[dupattaLacePosition]"
                                        id="dupattaLaceAllSides" value="allSides" onchange="toggleDupattaImage(this.value)">
                                    <label for="dupattaLaceAllSides" class="form-check-label">All Four Sides</label>
                                </div>

                                <!-- Images (initially hidden) -->
                                <div id="palluImage" class="mt-3" style="display: none;">
                                    <img src="images/dupatta/simple.PNG" alt="Only on Pallu" class="img-fluid" style="max-height: 200px;">
                                </div>
                                <div id="allSidesImage" class="mt-3" style="display: none;">
                                    <img src="images/dupatta/four_side_lace.PNG" alt="All Four Sides" class="img-fluid" style="max-height: 200px;">
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="male" role="tabpanel" aria-labelledby="male-tab">
                <div class="mt-4">
                    <div class="card">
                        <h3 style="color: #20c997;">Male Clothing Customization</h3>
                        <div class="mb-3">
                            <label for="maleStyle" class="form-label">Select Suit Type:<span class="required-asterisk">*</span></label>
                            <div id="maleStyleGroup" class="btn-group" role="group" aria-label="Male Style">
                                <button type="button" class="btn btn-outline-primary" data-value="Kurta">

                                    <img src="images/kurta_shalwar_male.PNG" class="img-fluid mb-2" alt="1 Piece" style="max-height:70px;">
                                    <div>Kurta Shalwar <br> PKR 2500</div>
                                </button>

                            </div>
                            <input type="hidden" id="maleStyle" name="male[style]" value="">
                        </div>
                        <div class="mb-3">
                            <label for="maleSize" class="form-label">Select Size:<span class="required-asterisk">*</span></label>
                            <div id="maleSizeGroup" class="btn-group" role="group" aria-label="Male Size">
                                <button type="button" class="btn btn-outline-primary" data-value="Small">Small</button>
                                <button type="button" class="btn btn-outline-primary" data-value="Medium">Medium</button>
                                <button type="button" class="btn btn-outline-primary" data-value="Large">Large</button>
                                <button type="button" class="btn btn-outline-primary" data-value="X-Large">X-Large</button>
                            </div>
                            <input type="hidden" id="maleSize" name="male[size]" value="">
                        </div>
                        <table class="table table-bordered mb-3">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Small</th>
                                    <th>Medium</th>
                                    <th>Large</th>
                                    <th>X-Large</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Kurta Length</td>
                                    <td>40</td>
                                    <td>42</td>
                                    <td>44</td>
                                    <td>46</td>
                                </tr>
                                <tr>
                                    <td>Chest</td>
                                    <td>23.5</td>
                                    <td>24.5</td>
                                    <td>25.5</td>
                                    <td>26</td>
                                </tr>
                                <tr>
                                    <td>Waist (6.5'' Down)</td>
                                    <td>21.5</td>
                                    <td>22.5</td>
                                    <td>23.5</td>
                                    <td>24.5</td>
                                </tr>
                                <tr>
                                    <td>Sleeves Length</td>
                                    <td>23.5</td>
                                    <td>24.5</td>
                                    <td>25.5</td>
                                    <td>26.5</td>
                                </tr>
                                <tr>
                                    <td>Collar</td>
                                    <td>15.5</td>
                                    <td>16.5</td>
                                    <td>17</td>
                                    <td>18</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mb-3">
                            <label for="maleCustomTopLength" class="form-label">Custom Top Length (inches): (optional)</label>
                            <input type="number" class="form-control" id="maleCustomTopLength" name="male[customTopLength]" placeholder="e.g., 34">
                            <small class="form-text text-muted">Example: Standard size for 5'3 top is 34 inches (above the knee).</small>
                        </div>
                        <div class="mb-3">
                            <label for="maleCollarStyle" class="form-label">Select Collar Style:<span class="required-asterisk">*</span></label>
                            <div id="maleCollarStyleGroup" class="btn-group" role="group" aria-label="Male Collar Style">
                                <button type="button" class="btn btn-outline-primary" data-value="Sherwani">Sherwani Collar</button>
                                <button type="button" class="btn btn-outline-primary" data-value="Full">Full Collar</button>
                            </div>
                            <input type="hidden" id="maleCollarStyle" name="male[collarStyle]" value="">
                        </div>
                        <div class="image-gallery mb-3" id="maleCollarImages"></div>
                        <input type="hidden" id="maleCollarImage" name="male[collarImage]">
                        <div class="mb-3">
                            <label for="maleDamaan" class="form-label">Select Damaan:<span class="required-asterisk">*</span></label>
                            <div id="maleDamaanGroup" class="btn-group" role="group" aria-label="Male Damaan">
                                <button type="button" class="btn btn-outline-primary" data-value="Round">Round Damaan</button>
                                <button type="button" class="btn btn-outline-primary" data-value="Square">Square Damaan</button>
                            </div>
                            <input type="hidden" id="maleDamaan" name="male[damaan]" value="">
                        </div>
                        <div class="image-gallery mb-3" id="maleDamaanImages"></div>
                        <input type="hidden" id="maleDamaanImage" name="male[damaanImage]">
                        <div class="mb-3">
                            <label class="form-label">Do you want to add buttons?<span class="required-asterisk">*</span></label>
                            <div>
                                <input type="radio" class="form-check-input" name="male[buttons]" id="maleButtonsYes" value="yes">
                                <label for="maleButtonsYes" class="form-check-label">Yes</label>
                                <input type="radio" class="form-check-input" name="male[buttons]" id="maleButtonsNo" value="no" checked>
                                <label for="maleButtonsNo" class="form-check-label">No</label>
                            </div>
                        </div>
                        <div id="maleButtonOptions" class="section">
                            <div class="mb-3">
                                <label class="form-label">Button Source:<span class="required-asterisk">*</span></label>
                                <div id="maleButtonSourceGroup" class="btn-group" role="group" aria-label="Male Button Source">
                                    <button type="button" class="btn btn-outline-primary" data-value="own">I will provide my own</button>
                                    <button type="button" class="btn btn-outline-primary" data-value="library">Choose from the button library</button>
                                </div>
                                <input type="hidden" id="maleButtonSource" name="male[buttonSource]" value="">
                            </div>
                            <div id="maleButtonLibraryOptions" class="section">
                                <div class="mb-3">
                                    <label class="form-label">Select Button Style:<span class="required-asterisk">*</span></label>
                                    <div class="container image-gallery mb-3" id="maleButtonImages">
                                        <div class="row">
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_1.webp" alt="Button Style 1" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_2.webp" alt="Button Style 2" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_3.webp" alt="Button Style 3" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_4.webp" alt="Button Style 4" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_5.webp" alt="Button Style 5" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_6.webp" alt="Button Style 6" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_7.webp" alt="Button Style 7" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_8.webp" alt="Button Style 8" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_9.webp" alt="Button Style 9" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_10.webp" alt="Button Style 10" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_11.webp" alt="Button Style 11" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_12.webp" alt="Button Style 12" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_13.webp" alt="Button Style 13" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_14.webp" alt="Button Style 14" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_15.webp" alt="Button Style 15" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_16.webp" alt="Button Style 16" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_17.webp" alt="Button Style 17" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_18.webp" alt="Button Style 18" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_19.webp" alt="Button Style 19" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_20.webp" alt="Button Style 20" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_21.webp" alt="Button Style 21" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                            <div class="col-md-2 text-center mb-4">
                                                <img src="images/buttons/male/style_22.webp" alt="Button Style 22" data-price="25" class="img-fluid">
                                                <p>PKR 25</p>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="maleButtonImage" name="male[buttonImage]">
                                </div>
                                <p id="selectedMaleButtonPrice">Selected Button Price: PKR 0</p>
                            </div>
                            <div class="mb-3">
                                <label for="maleButtonStyle" class="form-label">Select Button Style:<span class="required-asterisk">*</span></label>
                                <div id="maleButtonStyleGroup" class="btn-group" role="group" aria-label="Male Button Style">

                                    <button type="button" class="btn btn-outline-primary" data-value="double">Double Placket</button>
                                    <button type="button" class="btn btn-outline-primary" data-value="single">Single Placket</button>

                                </div>
                                <div>
                                    <p class="disclaimer mt-2">Disclaimer: Double Placket include four buttons for an additional of PKR 100.</p>
                                </div>
                                <input type="hidden" id="maleButtonStyle" name="male[buttonStyle]" value="">
                            </div>
                            <div class="image-gallery mb-3" id="maleButtonStyleImages"></div>
                            <input type="hidden" id="maleButtonStyleImage" name="male[buttonStyleImage]">
                        </div>
                        <div class="mb-3">
                            <label for="maleSleeves" class="form-label">Select Sleeves:<span class="required-asterisk">*</span></label>
                            <div id="maleSleevesGroup" class="btn-group" role="group" aria-label="Male Sleeves">
                                <button type="button" class="btn btn-outline-primary" data-value="Straight">Straight Sleeves</button>
                                <button type="button" class="btn btn-outline-primary" data-value="Cuff">Cuff Sleeves</button>
                            </div>
                            <div>
                                <p class="disclaimer mt-2">Disclaimer: Cuff sleeves include two buttons per sleeve (total 4 buttons) for an additional of PKR 100.</p>
                            </div>
                            <input type="hidden" id="maleSleeves" name="male[sleeves]" value="">
                        </div>
                        <div class="image-gallery mb-3" id="maleSleevesImages"></div>
                        <input type="hidden" id="maleSleevesImage" name="male[sleevesImage]">
                        <div class="mb-3">
                            <label for="maleBottomType" class="form-label">Select Bottom:<span class="required-asterisk">*</span></label>
                            <div id="maleBottomTypeGroup" class="btn-group" role="group" aria-label="Male Bottom Type">
                                <button type="button" class="btn btn-outline-primary" data-value="Shalwar">Shalwar</button>
                                <button type="button" class="btn btn-outline-primary" data-value="Trouser">Trouser</button>
                            </div>
                            <input type="hidden" id="maleBottomType" name="male[bottomType]" value="">
                        </div>
                        <div class="image-gallery mb-3" id="maleBottomStyleImages"></div>
                        <div class="mb-3">
                            <label for="maleBottomSize" class="form-label">Select Bottom Size:<span class="required-asterisk">*</span></label>
                            <div id="maleBottomSizeGroup" class="btn-group" role="group" aria-label="Male Bottom Size">
                                <button type="button" class="btn btn-outline-primary" data-value="X-Small">X-Small</button>
                                <button type="button" class="btn btn-outline-primary" data-value="Small">Small</button>
                                <button type="button" class="btn btn-outline-primary" data-value="Medium">Medium</button>
                                <button type="button" class="btn btn-outline-primary" data-value="Large">Large</button>
                                <button type="button" class="btn btn-outline-primary" data-value="X-Large">X-Large</button>
                            </div>
                            <input type="hidden" id="maleBottomSize" name="male[bottomSize]" value="">
                        </div>
                        <div id="maleShalwarChart" class="section">
                            <table class="table table-bordered mb-3">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>X-Small</th>
                                        <th>Small</th>
                                        <th>Medium</th>
                                        <th>Large</th>
                                        <th>X-Large</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Bottom</td>
                                        <td>16</td>
                                        <td>16</td>
                                        <td>16</td>
                                        <td>17</td>
                                        <td>17</td>
                                    </tr>
                                    <tr>
                                        <td>Length</td>
                                        <td>39-40</td>
                                        <td>40</td>
                                        <td>42</td>
                                        <td>44</td>
                                        <td>45</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="maleTrouserChart" class="section">
                            <table class="table table-bordered mb-3">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>X-Small</th>
                                        <th>Small</th>
                                        <th>Medium</th>
                                        <th>Large</th>
                                        <th>X-Large</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Waist (Relaxed)</td>
                                        <td>25</td>
                                        <td>27</td>
                                        <td>29</td>
                                        <td>31</td>
                                        <td>33</td>
                                    </tr>
                                    <tr>
                                        <td>Length</td>
                                        <td>38</td>
                                        <td>40</td>
                                        <td>42</td>
                                        <td>44</td>
                                        <td>45</td>
                                    </tr>
                                    <tr>
                                        <td>Bottom</td>
                                        <td>13</td>
                                        <td>13.5</td>
                                        <td>14</td>
                                        <td>14.5</td>
                                        <td>15</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mb-3">
                            <label for="maleCustomBottomLength" class="form-label">Custom Bottom Length (inches): (optional)</label>
                            <input type="number" class="form-control" id="maleCustomBottomLength" name="male[customBottomLength]" placeholder="e.g., 40">
                        </div>

                        <input type="hidden" id="maleBottomStyleImage" name="male[bottomStyleImage]">
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <h4>Address Details</h4>
            <div class="mb-3">
                <label for="fullName" class="form-label">Full Name:<span class="required-asterisk">*</span></label>
                <input type="text" class="form-control" id="fullName" name="address[fullName]" placeholder="e.g., John Doe" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:<span class="required-asterisk">*</span></label>
                <input type="email" class="form-control" id="email" name="address[email]" placeholder="e.g., john@example.com" required>
            </div>
            <div class="mb-3">
                <label for="streetAddress" class="form-label">Street Address:<span class="required-asterisk">*</span></label>
                <input type="text" class="form-control" id="streetAddress" name="address[streetAddress]" placeholder="e.g., 123 Main St" required>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City:<span class="required-asterisk">*</span></label>
                <input type="text" class="form-control" id="city" name="address[city]" placeholder="e.g., Karachi" required>
            </div>
            <div class="mb-3">
                <label for="postalCode" class="form-label">Postal Code:<span class="required-asterisk">*</span></label>
                <input type="text" class="form-control" id="postalCode" name="address[postalCode]" placeholder="e.g., 12345" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number:<span class="required-asterisk">*</span></label>
                <input type="tel" class="form-control" id="phone" name="address[phone]" placeholder="e.g., +92 123 4567890" required>
            </div>
        </div>

        <div id="summary" class="card mt-4">
            <h4>Order Summary</h4>
            <ul id="summaryList"></ul>
        </div>

        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-primary w-100" style="max-width: 600px;">Submit Order</button>
        </div>
    </form>
</div>
<script>
    function toggleDupattaImage(selectedValue) {
        document.getElementById('palluImage').style.display = selectedValue === 'pallu' ? 'block' : 'none';
        document.getElementById('allSidesImage').style.display = selectedValue === 'allSides' ? 'block' : 'none';
    }
</script>
<script src="js/services.js"></script>
<?php include 'footer.php'; ?>