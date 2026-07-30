<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>Explore Resources & Scholarships - UniScholar</title>
    <!-- Bootstrap 5 CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="../js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php require 'navbar.php'; ?>

    <div class="container my-5">
       
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="fw-bold"><i class="bi bi-compass me-2" style="color: var(--color-accent);"></i> Explore Hub</h1>
                <p class="text-white-50">Discover academic documents or track funding opportunities instantly.</p>
            </div>
        </div>

        
        <div class="filter-section p-4 mb-5 shadow">
            <form action="" method="GET" class="row g-3">
                <div class="col-md-6 col-lg-4">
                    <label class="form-label text-white-50 small">Keyword Search</label>
                    <div class="input-group">
                        <span class="input-group-text bg-dark border-secondary text-white-50"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" name="query" placeholder="Type course code, country or topic...">
                    </div>
                </div>
                <div class="col-md-3 col-lg-4">
                    <label class="form-label text-white-50 small">Category Field</label>
                    <select class="form-select" name="category">
                        <option value="">All Streams & Domains</option>
                        <option value="notes">Lecture Archives / Material</option>
                        <option value="papers">Past Exam Papers</option>
                        <option value="scholarships">Financial Scholarships</option>
                    </select>
                </div>
                <div class="col-md-3 col-lg-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-accent w-100 py-2"><i class="bi bi-funnel-fill me-2"></i>Apply Filters</button>
                </div>
            </form>
        </div>

        
        <ul class="nav nav-tabs mb-4 justify-content-start" id="exploreTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active fs-5 pb-3 px-4" id="resources-tab" data-bs-toggle="tab" data-bs-target="#resources-pane" type="button" role="tab"><i class="bi bi-file-earmark-text me-2"></i>Academic Resources</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fs-5 pb-3 px-4" id="scholarships-tab" data-bs-toggle="tab" data-bs-target="#scholarships-pane" type="button" role="tab"><i class="bi bi-mortarboard me-2"></i>Global Scholarships</button>
            </li>
        </ul>

        
        <div class="tab-content" id="exploreTabsContent">

         
            <div class="tab-pane fade show active" id="resources-pane" role="tabpanel" tabindex="0">
                <div class="row g-4">

                   
                    <div class="col-md-6 col-lg-4">
                        <div class="card explore-card h-100 p-3 text-white">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <span class="badge badge-accent px-2 py-1 fs-7">CMT 1307</span>
                                    <span class="text-white-50 small"><i class="bi bi-filetype-pdf text-danger me-1"></i> PDF Archive</span>
                                </div>
                                <h5 class="card-title fw-bold mb-2"> Mathematics for Technology Lecture Pack</h5>
                                <p class="card-text text-white-50 small flex-grow-1">Comprehensive reference documents encompassing layout trees, responsive structures, and baseline forms.</p>
                                <hr class="border-secondary my-3">
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <span class="small opacity-50"><i class="bi bi-cloud-arrow-up me-1"></i> Batch 2023</span>
                                    <a href="#" class="btn btn-outline-light btn-sm px-3"><i class="bi bi-download me-1"></i> Access</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card explore-card h-100 p-3 text-white">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <span class="badge badge-accent px-2 py-1 fs-7">ICT 1209</span>
                                    <span class="text-white-50 small"><i class="bi bi-filetype-pdf text-danger me-1"></i> PDF Archive</span>
                                </div>
                                <h5 class="card-title fw-bold mb-2">Web Technologies Lecture Pack</h5>
                                <p class="card-text text-white-50 small flex-grow-1">Comprehensive reference documents encompassing layout trees, responsive structures, and baseline forms.</p>
                                <hr class="border-secondary my-3">
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <span class="small opacity-50"><i class="bi bi-cloud-arrow-up me-1"></i> Batch 2024</span>
                                    <a href="#" class="btn btn-outline-light btn-sm px-3"><i class="bi bi-download me-1"></i> Access</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card explore-card h-100 p-3 text-white">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <span class="badge badge-accent px-2 py-1 fs-7">ICT 1202</span>
                                    <span class="text-white-50 small"><i class="bi bi-filetype-zip text-warning me-1"></i> ZIP Suite</span>
                                </div>
                                <h5 class="card-title fw-bold mb-2">Database Systems Mid-Term Papers</h5>
                                <p class="card-text text-white-50 small flex-grow-1">Previous evaluation models focusing heavily on relational architecture mappings and key schema setups.</p>
                                <hr class="border-secondary my-3">
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <span class="small opacity-50"><i class="bi bi-cloud-arrow-up me-1"></i> Batch 2023</span>
                                    <a href="#" class="btn btn-outline-light btn-sm px-3"><i class="bi bi-download me-1"></i> Access</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            
            <div class="tab-pane fade" id="scholarships-pane" role="tabpanel" tabindex="0">
                <div class="row g-4">

                   
                    <div class="col-md-6">
                        <div class="card explore-card h-100 p-3 text-white">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <span class="badge bg-success text-dark fw-bold px-2 py-1">Fully Funded</span>
                                    <span class="text-warning small"><i class="bi bi-geo-alt-fill me-1"></i> Japan</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <?php require 'Footer.php'; ?>

</body>

</html>