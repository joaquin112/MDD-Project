<?php

function calculateRating($value, $votes, $currentRating) {
	
	$newVotes = $votes + 1;
	
	$votesSum = $currentRating * $votes;
	
	$votesSum = $votesSum + $value;
	
	$finalValue = $votesSum / $newVotes;
	
	return($finalValue);
	
}

$userId = $this->tank_auth->get_user_id();

$id = $this->input->post('id');

$value = $this->input->post('value');

if (!$this->tank_auth->is_logged_in()) {
	
	die("You must be logged in");
	
}

$this->load->database();

$this->db->from("votes")->where("userid", $userId)->order_by("time", "desc");
$query = $this->db->get();
$row = $query->row();

$userLastRating = $row->rating;
$userLastTime = $row->time;

if ($userLastRating < 3) {
	
	$timeDifference = time() - $userLastTime;
	
	if ($timeDifference < 5) {
		
		die();
		
	}
	
}

$this->db->from("votes")->where("userid", $userId)->where("thoughtid", $id)->order_by("time", "desc");
$query = $this->db->get();
if ($query->num_rows > 0) {
	
	die("Already voted");
	
}


$data = array(
   'id' => '',
   'userid' => $userId,
   'thoughtid' => $id,
   'rating' => $value,
   'time' => time()
);

$this->db->insert("votes", $data);

$this->db->select("rating, votes")->from("thoughts")->where("id", $id);

$query = $this->db->get();

$row = $query->row();

$currentRating = $row->rating;

$currentVotes = $row->votes;

$newVotes = $currentVotes + 1;

$newVoteValue = calculateRating($value, $currentVotes, $currentRating);

$data = array("votes" => $newVotes, "rating" => $newVoteValue);

$this->db->where("id", $id);

$this->db->update("thoughts", $data);
	
?>