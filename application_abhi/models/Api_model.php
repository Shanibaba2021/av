<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Api_model extends CI_Model
{

    function addNewBeneficiary($BeneficiaryInfo)
    {
        $status = $BeneficiaryInfo["status"];
        $safety_kit = json_decode($BeneficiaryInfo["safety_kit"]);

        if ($status == 0) {

            $this->db->trans_start();

            $this->db->insert('tbl_beneficiary', $BeneficiaryInfo);

            $insert_id = $this->db->insert_id();

            $this->db->trans_complete();

            return $insert_id;
        } else {

            $this->db->trans_start();

            $this->db->insert('tbl_beneficiary', $BeneficiaryInfo);

            $qun = 1;

            foreach ($safety_kit as  $value) {
                $this->db->set('assign_quantity', 'assign_quantity - ' . $qun, FALSE);
                $this->db->where("pname", $value);
                $this->db->where("bname", $BeneficiaryInfo['branch']);
                $this->db->update('tbl_assign_item_branch');
                $kitarray[] = array("kit_id" => $value, "fid" => $BeneficiaryInfo["fId"], "branchid" => $BeneficiaryInfo["branch"]);
            }


            $this->db->insert_batch('table_kit_distributaion', $kitarray);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return 0;
            } else {
                $this->db->trans_commit();
                return 1;
            }
        }
    }

    function addNewevent($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_event', $userInfo);


        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }

    function getListTable($table)
    {
        $this->db->select("*");

        $this->db->from($table);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getassignbranch($table, $id)
    {

        $this->db->select("*,tbl_branchassign.status");

        $this->db->from('tbl_branches');

        $this->db->join("tbl_branchassign", "tbl_branchassign.bid = tbl_branches.branchId", "INNER");

        $this->db->order_by("branchId", "desc");

        $this->db->where('tbl_branchassign.fid', $id);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getsafetykit($table, $branchId)
    {
        $this->db->select('*');
        $this->db->where('bname', $branchId);
        $query = $this->db->get('tbl_assign_item_branch');

        if ($query->num_rows() > 0) {

            $this->db->select("$table.*  ,tbl_product.pname as productname , tbl_assign_item_branch.pname as pname,tbl_product.pname as productname");

            $this->db->from($table);

            $this->db->join("tbl_product", "tbl_assign_item_branch.pname = tbl_product.id", "left");

            $this->db->where('bname', $branchId);

            $query = $this->db->get();

            return $result = $query->result();
        } else {
            return array();
        }
    }


    function get_funcation($table, $branchId)
    {
        $this->db->select("* ,id as funcation_id");

        $this->db->from($table);

        $this->db->where('branch', $branchId);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getgallery($table)
    {

        $this->db->select("*");

        $this->db->from($table);

        $query = $this->db->get();

        return $result = $query->result();
    }
    function getevent($table)
    {

        $this->db->select("*");

        $this->db->from($table);

        $query = $this->db->get();

        return $result = $query->result();
    }
    function getschemes($table)
    {

        $this->db->select("*");

        $this->db->from($table);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function gettraining($table)
    {

        $this->db->select("*");

        $this->db->from($table);

        $query = $this->db->get();

        return $result = $query->result();
    }
    function getnotice($table)
    {

        $this->db->select("*");

        $this->db->from($table);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getbanner($table)
    {

        $this->db->select("*");

        $this->db->from($table);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getbeneficiarylistbyid($table, $bId)
    {

        $this->db->select("*");

        $this->db->from($table);

        $this->db->where('bid', $bId);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getbeneficiarylistbyfid($table, $fid)
    {

        $this->db->select("*,tbl_beneficiary.permanent_address as residence , tbl_branches.branchId as bname,tbl_branches.bname as branchname,tbl_beneficiary.mobile as mobile_number ,tbl_beneficiary.current_address as present_address,tbl_beneficiary.pincode as present_pin_code,tbl_beneficiary.qualification as education,tbl_beneficiary.f_m_income_daily_income as family_income,tbl_beneficiary.number_earning_family_member as earning_member,numbers_children as num_of_child ,tbl_beneficiary.insured_name as insurance_name");

        $this->db->from($table);

        $this->db->join("tbl_branches", "tbl_beneficiary.branch = tbl_branches.branchId", "left");

        $this->db->order_by("bId", "desc");

        $this->db->where('tbl_beneficiary.fId', $fid);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function updateDataInsurance($table, $data, $bId)
    {

        $this->db->where("bId", $bId);

        $this->db->update($table, $data);

        return $this->db->affected_rows();
    }

    function updateData($table, $data, $bId)
    {

        $status = $data['status'];

        $safety_kit = json_decode($data['safety_kit']);

        if ($status == 0) {
            $this->db->where('bId', $bId);

            $this->db->update('tbl_beneficiary', $data);

            return $this->db->affected_rows();
        } else {
            $query = $this->db->get_where($table, array('bId' => $bId));
            $assignKit = $query->result();

            if ($assignKit[0]->assignKit == 0) {

                $this->db->where('bId', $bId);

                $this->db->update('tbl_beneficiary', $data);

                $qun = 1;

                foreach ($safety_kit as  $value) {
                    $this->db->set('assign_quantity', 'assign_quantity - ' . $qun, FALSE);
                    $this->db->where("pname", $value);
                    $this->db->where("bname", $data['branch']);
                    $this->db->update('tbl_assign_item_branch');
                    $kitarray[] = array("kit_id" => $value, "branchid" => $data["branch"]);
                }
                $this->db->insert_batch('table_kit_distributaion', $kitarray);

                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return 0;
                } else {
                    $this->db->trans_commit();
                    return 1;
                }
            } else {
                $this->db->where('bId', $bId);

                $this->db->update('tbl_beneficiary', $data);

                return $this->db->affected_rows();
            }
        }
    }


    function addInsurance($userInfo)
    {
        $this->db->trans_start();

        $this->db->insert('tbl_applyinsurance', $userInfo);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }


    function addInsuranceClaim($userInfo)
    {
        $this->db->trans_start();

        $this->db->insert('tbl_claim', $userInfo);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }

    function getInsurancelistbybid($table, $bId, $fId)
    {

        $this->db->select("fId,bId,bId as insurance_id,insurance,insured_name,nominee_name,nominee_dob,relation_with_insured,date_from_policy,politically_exposed,relation_with_insured_name");

        $this->db->from($table);

        $this->db->where('fId', $fId);

        $this->db->where('bId', $bId);

        $query = $this->db->get();

        return $result = $query->result_array();
    }

    function getListbeneficiary($table, $fId)
    {
        $this->db->select("COUNT(bId) as total_leads");

        $this->db->from($table);

        $this->db->where('fId', $fId);

        $query = $this->db->get();

        return $result = $query->result_array();
    }

    function getInsurance($table, $fId)
    {
        $this->db->select("COUNT(insurance) as total_insurance");

        $this->db->from($table);

        $this->db->where('fId', $fId);

        $this->db->where('insurance !=', 0);

        $query = $this->db->get();

        return $result = $query->result_array();
    }

    function totalbrach($table, $fid)
    {
        $this->db->select("COUNT(bid) as total_branch");

        $this->db->from($table);

        $this->db->where('fid', $fid);

        $query = $this->db->get();

        return $result = $query->result_array();
    }

    function getfunation($table, $fid)
    {

        $this->db->select("COUNT(DISTINCT(training_id)) as training_session");

        $this->db->from("tbl_beneficiary");

        $this->db->where('fid', $fid);

        $query = $this->db->get();

        return $result = $query->result_array();
    }

    function getClaimlistbybid($table, $bId)
    {
        $this->db->select("*");

        $this->db->from($table);

        $this->db->where('bId', $bId);

        $query = $this->db->get();

        return $result = $query->result_array();
    }


    function getListTableByCol($table, $col, $colval)
    {

        $this->db->select("*");

        $this->db->from($table);

        $this->db->where("$col", $colval);

        $query = $this->db->get();

        return $result = $query->result_array();
    }

    function getListTableByAssignBranch($table, $col, $colval)
    {

        $this->db->select("*");

        $this->db->from($table);

        $this->db->join("tbl_product", "tbl_product.id = tbl_assign_item_branch.pname", "left");

        $this->db->where("$col", $colval);

        $query = $this->db->get();

        return $result = $query->result_array();
    }

    function gettsession($table, $fid, $bid)
    {

        $this->db->select("tbl_session.id,tbl_session.address,tbl_session.name as name,CONCAT(tbl_users.fname,' ',tbl_users.lname) as fieldworker,tbl_branches.bname as bname,tbl_session.bid as bid");

        $this->db->from($table);

        $this->db->join("tbl_branches", "tbl_branches.branchId = tbl_session.bid", "left");
        $this->db->join("tbl_users", "tbl_users.userId = tbl_session.fid", "left");

        $this->db->where('fid', $fid);
        if ($bid != 0) {
            $this->db->where('bid', $bid);
        }

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getInsuranceLIst($table, $fid)
    {

        $this->db->select("*");

        $this->db->from($table);

        $this->db->where('insurance !=', 0);

        $this->db->where('fid', $fid);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function updatepassword($table, $data, $user_id)
    {

        $this->db->where("userId", $user_id);

        $this->db->update($table, $data);

        return $this->db->affected_rows();
    }

    function addNewtrainingsession($trainingsession)
    {

        $this->db->trans_start();

        $this->db->insert('tbl_session', $trainingsession);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }
    function updatetrainingsession($table, $data, $id)
    {
        $this->db->where("id", $id);

        $this->db->update($table, $data);

        return $this->db->affected_rows();
    }
}
