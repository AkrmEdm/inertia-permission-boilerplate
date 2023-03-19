<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

import { ref } from 'vue';
import Table from '@/Components/Table.vue';
import TableRow from '@/Components/TableRow.vue';
import TableHeaderCell from '@/Components/TableHeaderCell.vue';
import TableDataCell from '@/Components/TableDataCell.vue';
import Modal from '@/Components/Modal.vue';
import DangerButton from '@/Components/DangerButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';


defineProps(['permissions']);

const form = useForm({})

const showConfirmDeleterPermissionModal = ref(false)

const confirmDeleterPermission = () => {
    showConfirmDeleterPermissionModal.value = true;
}

const closeModal = () => {
    showConfirmDeleterPermissionModal.value = false;
}

const deleterPermission = (id) => {
    form.delete(route('permissions.destroy', id), {
        onSuccess: () => closeModal()
    });
}
</script>

<template>
    <Head title="Permission" />

    <AdminLayout>

        <div class="max-w-7xl mx-auto py-4">
            <div class="flex justify-between">
                <h1>Permission Index</h1>
                <Link :href="route('permissions.create')" class="px-3 py-2 text-white font-semibold bg-sky-500 hover:bg-sky-700 rounded">New Permission</Link>
            </div>

            <div class="mt-6">
                <Table>
                    <template #header>
                        <TableRow>
                            <TableHeaderCell>ID</TableHeaderCell>
                            <TableHeaderCell>Name</TableHeaderCell>
                            <TableHeaderCell>Actions</TableHeaderCell>
                        </TableRow>
                    </template>
                    <template #default>
                        <TableRow v-for="permission in permissions" :key="permission.id" class="border-b">
                            <TableDataCell>{{ permission.id }}</TableDataCell>
                            <TableDataCell>{{ permission.name }}</TableDataCell>
                            <TableDataCell class="space-x-4">
                                <Link :href="route('permissions.edit', permission.id)" class="text-green-400 hover:text-green-600">Edit</Link >
                                
                                <button @click="confirmDeleterPermission" class="text-red-400 hover:text-red-600">Delete</button>
                                
                                <Modal :show="showConfirmDeleterPermissionModal" @close="closeModal">
                                    <div class="p-6">
                                        <h2 class="text-lg font-semi-bold text-slate-800">Are you sure to delete this permission?</h2>
                                        <div class="mt-6 flex space-x-4">
                                            <DangerButton @click="deleterPermission(permission.id)">Delete</DangerButton>
                                            <SecondaryButton @click="closeModal">Cancel</SecondaryButton>
                                        </div>
                                    </div>
                                </Modal>
                            </TableDataCell>
                        </TableRow>
                    </template>
                </Table>
            </div>
        </div>
    </AdminLayout>
</template>
