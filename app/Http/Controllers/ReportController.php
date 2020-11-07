<?php

namespace App\Http\Controllers;

use App\Repositories\DeliveryRepository;
use App\Repositories\Interfaces\ReportRepositoryInterface;
use App\Repositories\ReceiveRepository;
use PDF;

class ReportController extends Controller
{
    private $reportRepository;

    public function __construct(ReportRepositoryInterface $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }


    public function downloadLoadingReport($receive_no)
    {
        $receiveRepository = new ReceiveRepository();
        $pdf = PDF::loadView('loading_receipt', [
            'receive' => $receiveRepository->getReceiveDetails($receive_no),
        ]);
        return $pdf->stream();
    }

    public function downloadGatepass($gatepass_no)
    {
        $deliveryRepository = new DeliveryRepository();
        $pdf = PDF::loadView('gatepass_receipt', [
            'receive' => $deliveryRepository->getGatepassDetails($gatepass_no),
        ]);
        return $pdf->stream();
    }

    public function downloadSalaryReport($month)
    {
        $salaries = $this->reportRepository->fetchAllSalaries($month);
        $pdf = PDF::loadView('salary_report', [
            'salaries' => $salaries,
        ]);
        return $pdf->stream();
        //return $pdf->download('employees_salary_report');
    }

    public function downloadBankDepositReport($month)
    {
        $deposits = $this->reportRepository->getDeposits($month);

        $banks = $this->reportRepository->getBanks();
        $pdf = PDF::loadView('bankdeposit_report', [
            'deposits' => $deposits,
            'banks' => $banks,
        ]);
        return $pdf->stream();
        //return $pdf->download('bank_deposit_report');
    }

    public function downloadExpenseReport($month) {
        $expenses = $this->reportRepository->fetchDailyexpenses($month);
        $pdf = PDF::loadView('expense_report',[
            'expenses' => $expenses,
        ]);
        return $pdf->stream();
    }
    public function getReceiveReceipt($id)
    {
        $receiptinfo = $this->reportRepository->fetchReceiveReceiptInfo($id);
        $pdf = PDF::loadView('receive_receipt',[
            'receiptinfo' => $receiptinfo
        ]);
        return $pdf->stream();
        //return $pdf->download('bank_deposit_report');
    }
    public function getGatePass($delivery_id){
        $gatePass = $this->reportRepository->fetchGatepass($delivery_id);
        $pdf = PDF::loadView('gatepass_receipt',[
            'gatepassInfo' => $gatePass
        ]);
        return $pdf->stream();
    }

}
