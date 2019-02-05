<?php

namespace SecurionPay\Request;

class ThreeDSecureRequest extends AbstractRequest
{

	public function getRequireAttempt()
	{
		return $this->get('requireAttempt');
	}

	public function getRequireEnrolledCard()
	{
		return $this->get('requireEnrolledCard');
	}

	public function getRequireSuccessfulLiabilityShiftForEnrolledCard()
	{
		return $this->get('requireSuccessfulLiabilityShiftForEnrolledCard');
	}

	public function requireAttempt($requireAttempt)
	{
		return $this->set('requireAttempt', $requireAttempt);
	}

	public function requireEnrolledCard($requireEnrolledCard)
	{
		return $this->set('requireEnrolledCard', $requireEnrolledCard);
	}

	public function requireSuccessfulLiabilityShiftForEnrolledCard($requireSuccessfulLiabilityShiftForEnrolledCard)
	{
		return $this->set('requireSuccessfulLiabilityShiftForEnrolledCard', $requireSuccessfulLiabilityShiftForEnrolledCard);
	}

}
