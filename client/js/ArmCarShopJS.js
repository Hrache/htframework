var ArmCarShopJS =
{
	w3Tabs:
	{
		activeTab: '',
		changeActiveTab: function(idSelector)
		{
			if (ArmCarShopJS.w3Tabs.activeTab)
			{
				w3.hide(ArmCarShopJS.w3Tabs.activeTab);
			}

			ArmCarShopJS.w3Tabs.activeTab = idSelector;

			w3.show(idSelector);
		},
	},

	/**
	* @file js common.inc
	* @param brandId The id of the input for the vehicle brand
	* @param modelId The id of the input for the vehicles model
	* @param {string} url The url for ajax
	* @param function complete The function that will be called at the stage of completion
	* @return void | boolean
	*/
	BrandForModel: function(brandId, modelId, url, complete)
	{
		$("#"+brandId).change(function()
		{
			carBrand = parseInt($(this).val());

			if (!carBrand)
			{
				$('#'+modelId).html("").hide();
			}
			else
			{
				$.post(url,
				{
					'brand': carBrand
				},
				function(data, textStatus, jqXHR)
				{
					$('#'+modelId).html(data);

					complete();
				}, 'text');
			}

			return true;
		});
	},
};