<div x-data="tagComponent()" class="mb-6">
    <label class="block text-gray-700 font-bold mb-2">Tags</label>

    <div class="border p-2 rounded">
        <div class="flex flex-wrap gap-2">
            <template x-for="(tag, index) in selectedTags" :key="index">
                <span class="bg-blue-500 text-white px-2 py-1 rounded-full flex items-center">
                    <span x-text="tag.name"></span>
                    <button type="button" class="ml-2 text-white" @click="removeTag(index)">✖</button>
                </span>
            </template>
        </div>
    </div>

    <input 
        type="text" 
        x-model="searchTag" 
        class="border mt-2 p-2 w-full rounded" 
        placeholder="Escribe para buscar tags..."
        @input="filterTags"
    >

    <div class="mt-2 border rounded p-2 max-h-32 overflow-y-auto" x-show="filteredTags.length">
        <template x-for="tag in filteredTags" :key="tag.id">
            <div class="cursor-pointer p-2 hover:bg-gray-200 rounded" @click="addTag(tag)">
                <span x-text="tag.name"></span>
            </div>
        </template>
    </div>


    <template x-for="tag in selectedTags" :key="tag.id">
        <input type="hidden" name="tags[]" :value="tag.id">
    </template>
</div>

<script>
    function tagComponent() {
        return {
            allTags: @json(\App\Models\Tag::all()),
            selectedTags: [],
            searchTag: '',
            filteredTags: [],

            filterTags() {
                if (this.searchTag.length > 0) {
                    this.filteredTags = this.allTags.filter(tag => 
                        tag.name.toLowerCase().includes(this.searchTag.toLowerCase())
                    );
                } else {
                    this.filteredTags = [];
                }
            },

            addTag(tag) {
                if (!this.selectedTags.some(t => t.id === tag.id)) {
                    this.selectedTags.push(tag);
                }
                this.searchTag = '';
                this.filteredTags = [];
            },

            removeTag(index) {
                this.selectedTags.splice(index, 1);
            }
        };
    }
</script>
