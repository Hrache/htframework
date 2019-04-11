FrameworkNative = {
	w3Tabs:	{
		activeTab: '',
		changeActiveTab: function(idSelector) {
			if (FrameworkNative.w3Tabs.activeTab) w3.hide(FrameworkNative.w3Tabs.activeTab);

			FrameworkNative.w3Tabs.activeTab = idSelector;
			w3.show(idSelector);
		},
	},
};