<x-app-layout>
    <section id="services" class="services section-bg">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="section-title mb-4">
                <h2>Users</h2>
            </div>
                @livewire('show-user')
            <div class="row form-group col-lg-12">
                <div class="col-lg-9">
                    <div class="col-lg-9 mt-2">
                        {{ $Users->links()}}
                    </div>
                </div>
            </div>
        </div>
        

    </section>
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            var exampleModal = document.getElementById('exampleModal')
            exampleModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var recipient = button.getAttribute('data-bs-whatever')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var modalTitle = exampleModal.querySelector('.modal-title')
            var modalBodyInput = exampleModal.querySelector('.modal-body input')

            modalTitle.textContent =recipient
            modalBodyInput.value = recipient
            })
        </script>
    @endpush
</x-app-layout>