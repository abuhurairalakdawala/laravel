<?php

1) OFT\App\Api\Api.php
function : updateDwsSorterShipmentSolr();

2) OFT\App\Crons\Crons.php
function : deleteOrderFromSolr();

3) OFT\App\Directship\Directship.php
function : _getList();

4) OFT\App\Inward\Inward.php
function : _getList();

5) OFT\App\Itemmaster\Itemmaster.php
function : _getItemMaster();

6) OFT\App\Marketplace\Marketplace.php
function : updateSolrdoc();

7) OFT\App\Marketplace\Marketplace.php
function : _getList();
		   updateSolrdoc();

8) OFT\App\Merchant\Merchant.php
function : _getList();
		   merchantManifestBulkInsert();
		   deleteMerchantManifestsFromSolr();
		   GetDataFromSolrOnId();
		   async_manifest_process();
		   deleteOidPidFromSolr();

9) OFT\App\Warehouse\Warehouse.php
function : _getList();

10) OFT\App\Specialorders\Specialorders.php
function : _getList();
		   addSpecialOrderToSolr();

11) OFT\App\Returns\Rto\Common.php
function : addSolarRtoShipment();

12) OFT\App\Returns\Rto\Rto.php
function : dashboardData();

13) OFT\App\Returns\Rtv\Rtv.php
function : dashboardData();
		   ChallandashboardData();

14) OFT\App\Specialorders\Common.php
function : updateSpecialOrderDataInSolr();
		   insertSpecialOrders();

15) OFT\App\Sync\Sync.php
function : Ordersolr();
		   indexAllOrders();

16) OFT\App\Ondemand\Ondemand.php
function : _getList()

17) OFT\App\Ots\Ots.php
function : updateShipments()

18) OFT\App\Outbound\Calllist\Calllist.php
function : _getList();
		   updateShipmentItemDeliveryDateSolr();

19) OFT\App\Outbound\Invoice\Invoice.php
function : deleteInvoiceFromSolr()
		   addInvoiceInSolr();
		   SetInvoicesToSolr()
		   getInvoiceDataFromSolr()

20) OFT\App\Outbound\Invoice\common.php
function : updateInsertInvoiceNumber()

21) OFT\App\Outbound\Logisticpartner\Logisticpartner.php
function : SetLPDataInSolr();

22) OFT\App\Outbound\Manifest\Manifest.php
function : get_mf_dashboard()
		   SetMfDashboardToSolr()
		   cancle_data()
		   _updateSolr()
		   getDMSolr()
		   manifestBulkInsert()

23) OFT\App\Outbound\Outbound.php
function : setDispatchDataToSolr()
		   _getList()

24) OFT\App\Sync\Sync.php
function : IndexPOByID()
		   Ordersolr()
		   indexAllOrders()
		   updateShipments()

25) OFT\App\Specialorders\Specialorders.php
function : _getList();
		   addSpecialOrderToSolr()

26) OFT\App\Specialorders\common.php
function : updateSpecialOrderDataInSolr()
  		   insertSpecialOrders()


27) OFT\App\Returns\Rtv.php
function : dashboardData()
		   ChallandashboardData()

28) OFT\App\Returns\Rto.php
function : dashboardData();

29) OFT\App\Returns\Rto\Common.php
function : addSolarRtoShipment();

30) OFT\App\Returns\Returnshipment.php
function : getShipmentList();
		   getInitialShipmentList()
		   getInitialShipmentList()

31) OFT\App\Returns\Returns.php
function : addRtoJobsToSolr()
		   addRtvJobsToSolr()
		   save_new_challan_in_solr()
		   change_rtv_job_in_progress()
		   update_challan_in_solr()

32) OFT\App\Returns\Common.php
function : getOftRtoSr()
		   getOftRtvSr()

32) OFT\App\Qc\Other.php
function : dashboardData()

33) OFT\App\Qc\Other\Common.php
function : addSolarOtherItems()
		   update_next_action_solr()

34) OFT\App\Po\common.php
function : _GetPoList()
		   _updateOrdersolr()
		   updatePoStatusOnPoCancel()

35) OFT\App\Po\Po.php
function : _updatePoagainstOrders()
		   getDetailsbyproduct()
		   Approvepo()
		   Closepo()
		   Rejectpo()

36) OFT\App\Po\Grnadjust\Grnadjust.php
function : _getList();
		   grnBulkUpdate()
		   updateSolrGrn()
		   savegrn()
		   grnSolrUpdate()
		   grnSolrCreate()
		   updateSolrPoStatus()
		   UpdatePoDataInSolr()
		   updateEditableStatusToNoOfAGRN()

37) OFT\App\Po\Grn\Grn.php
function : Closegrn()
		   _getList()
		   grnBulkUpdate()
		   updateSolrGrn()
		   savegrn()
		   grnSolrUpdate()
		   grnSolrCreate()
		   updateSolrPo()

38) OFT\App\Po\Agrn\Agrn.php
function : _getList();

39) OFT\App\Outboundnv\Sortershipment\Sortershipment.php
function : updateDwsSorterShipmentDiscardSolr();
		   fetchDwsSorterShipment()

40) OFT\App\Outboundnv\Shipment\Shipment.php
function : removeInvoiceByEntityIds();
		   getShipmentDashboardDataFromSolr()

41) OFT\App\Outboundnv\Manifest\Manifest.php
function : cancel_data()
		   _bulkUpdateSolr()
		   SetMfDashboardToSolr()

42) OFT\App\Outbound\Shipment\Shipment.php
function : addShipmentToSolr()
		   setShipmentDashbordToSolr()
		   getShipmentDashboardDataFromSolr()
		   getAllLpdstarcdodesFromSolr()
		   getAllLpdstarcdodesFromSolr()
		   setLpdstarcdcodesToSolr()
		   Ajax()
		   removeInvoiceByEntityIds()
		   getShipmentDetails()
		   setNextAction()

42) OFT\App\Outbound\Sidmanifest\Sidmanifest.php
function : _updateSolr()
		   get_mf_dashboard()
		   SetMfDashboardToSolr()

43) OFT\App\Outboundnv\Deliverymanifest\Common.php
function : getDMSolr()

44) OFT\App\Outboundnv\Deliverymanifest\Deliverymanifest.php
function : manifestBulkInsert()

45) OFT\App\Outboundnv\Invoice\Invoice.php
function : deleteInvoiceFromSolr()
		   addInvoiceInSolr()
		   addInvoiceInSolr()
		   SetInvoicesToSolr()
		   getInvoiceDataFromSolr()

46) OFT\App\Outboundnv\Invoice\common.php
function : updateInsertInvoiceNumber()

47) OFT\App\Outboundnv\Manifest\Common.php
function : get_mf_dashboard()
		   SetMfDashboardToSolr()
		   update_rto_count()
		   updateRtoShipmentSolr()

48) OFT\App\Outboundnv\Invoice\Invoice_live.php
function : deleteInvoiceFromSolr()
		   addInvoiceInSolr()
		   SetInvoicesToSolr()
		   getInvoiceDataFromSolr()