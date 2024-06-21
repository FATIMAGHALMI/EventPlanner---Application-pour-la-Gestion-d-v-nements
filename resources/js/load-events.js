// Fichier: resources/js/load-events.js

$(document).ready(function() {
    var nextPageUrl = "{{ $events->nextPageUrl() }}";
    
    $('#see-more-btn').click(function() {
        if (nextPageUrl) {
            $.ajax({
                url: nextPageUrl,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var eventsHtml = '';
                    response.data.forEach(function(event) {
                        eventsHtml += `
                            <div class="event-card">
                                <div class="event-content">
                                    <img src="{{ asset('image/photo.jpg') }}" alt="photo" class="rounded-md">
                                    <h2 class="mt-2 text-2xl text-blue-800 ring-transparent transition hover:text-blue-400">
                                        Organized by: ${event.user ? event.user.name : 'N/A'}
                                    </h2>
                                    <p class="mt-2 font-bold text-xl">${event.title}</p>
                                    <h6 class="text-sm">Date: ${event.date}</h6>
                                </div>
                            </div>
                        `;
                    });

                    $('#events-container').append(eventsHtml);
                    nextPageUrl = response.next_page_url;
                    
                    if (!nextPageUrl) {
                        $('#see-more-btn').hide();
                    }
                },
                error: function(xhr) {
                    console.error('Error fetching events: ' + xhr.statusText);
                }
            });
        }
    });
});
