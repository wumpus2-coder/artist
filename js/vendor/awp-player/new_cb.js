function awpSetupDone(instance, instanceName){
}
function awpPlaylistEnd(instance, instanceName){
}
function awpMediaStart(instance, instanceName, counter){
}
function awpMediaPlay(instance, instanceName, counter){
	if(typeof awp_mediaArr != undefined && awp_mediaArr.length && awp_mediaArr.length > 1){
		var i, len = awp_mediaArr.length;
		for(i=0;i<len;i++){
			if(instance != awp_mediaArr[i].inst){
				awp_mediaArr[i].inst.checkMedia('pause');
			}
		}
	}
}
function awpMediaPause(instance, instanceName, counter){
}
function awpMediaEnd(instance, instanceName, counter){
}
function awpPlaylistStartLoad(instance, instanceName){
}
function awpPlaylistEndLoad(instance, instanceName, playlistContent){
}

function awpItemTriggered(instance, instanceName, counter){
	var data = instance.getPlaylistData()[counter].data;

	if(instanceName == 'voicer1' || instanceName == 'voicer2' || instanceName == 'voicer3'){

		var playerThumb = instance.find('.awp-player-thumb'),
			thumb = data.thumb || data.thumbDefault;

		if(playerThumb.length && typeof thumb !== 'undefined'){
			var img = new Image();
			img.className = "awp-hidden";
			img.onload = function () {
			   this.className = "awp-visible";
			}
			img.src = thumb;
			playerThumb[0].appendChild(img);
		}
		instance.find('.awp-player-title').html(data.title);
		instance.find('.awp-player-artist').html(data.artist);
	}                        
  
	else if(instanceName == 'fixed_bottom3' || instanceName == 'wall2'){
		instance.find('.awp-player-title').html(instance.getTitle(instance.getActiveItemId()));
		if(data.description && !AWPUtils.isEmpty(data.description))instance.find('.awp-player-desc').html(data.description);
	}
}
function awpPlaylistItemEnabled(instance, instanceName, item, id){
}
function awpPlaylistItemDisabled(instance, instanceName, item, id){
}
function awpPlaylistItemClick(instance, instanceName, target, counter){
}
function awpPlaylistItemRollover(instance, instanceName, target, id){
}
function awpPlaylistItemRollout(instance, instanceName, target, id, active){
}
function awpMediaEmpty(instance, instanceName){
}
function awpPlaylistEmpty(instance, instanceName, playlistContent){
}
function awpCleanMedia(instance, instanceName){
}
function awpDestroyPlaylist(instance, instanceName, playlistContent){
}
function awpVolumeChange(instance, instanceName, volume){
}
function awpFilterChange(instance, instanceName, playlistContent){
}