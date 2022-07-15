<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                    <a href="<?php echo site_url('admin/jobs/add_jobs'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_jobs'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('jobs'); ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('job_title'); ?></th>
                                <th><?php echo get_phrase('job_category'); ?></th>
                                <th><?php echo get_phrase('short_descripation'); ?></th>
                                <th><?php echo get_phrase('salary_range'); ?></th>
                                <th><?php echo get_phrase('no_of_vacancy'); ?></th>
                                <th><?php echo get_phrase('experience'); ?></th>
                                <th><?php echo get_phrase('job_type'); ?></th>
                                <th><?php echo get_phrase('education'); ?></th>
                                <th><?php echo get_phrase('skills'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($jobs->result_array() as $key => $user) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $user['job_title'] ?></td>
                                    <td><?php echo $user['job_category']; ?></td>
                                    <td><?php echo $user['short_description']; ?></td>
                                    <td><?php echo $user['salary_range']; ?></td>
                                    <td><?php echo $user['no_of_vacancy']; ?></td>
                                    <td><?php echo $user['job_experience']; ?></td>
                                    <td><?php echo $user['job_type']; ?></td>
                                    <td><?php echo $user['education']; ?></td>
                                    <td><?php echo $user['skills']; ?></td>
                                    <td>

                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/jobs/jobs_edit/' . $user['job_id']) ?>"><?php echo get_phrase('edit'); ?></a></li>
                                                <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/jobs_action/delete/' . $user['job_id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                            </ul>
                                        </div>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>