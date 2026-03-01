import axios from 'axios';
import config from '../config.js';

/**
 * API Utility Functions
 * 
 * Helper functions for making API requests using axios
 */

// Create axios instance with base configuration
const apiClient = axios.create({
  baseURL: config.apiDomain, // Remove trailing slash
  headers: {
    'Content-Type': 'application/json',
  },
});

/**
 * Make a GET request to the API
 * @param {string} endpoint - API endpoint (e.g., '/products')
 * @param {object} options - Axios options
 * @returns {Promise} Axios response data
 */
export async function get(endpoint, options = {}) {
  try {
    const response = await apiClient.get(endpoint, options);
    return response.data;
  } catch (error) {
    throw error;
  }
}

/**
 * Make a POST request to the API
 * @param {string} endpoint - API endpoint
 * @param {object} data - Request body data
 * @param {object} options - Axios options
 * @returns {Promise} Axios response data
 */
export async function post(endpoint, data, options = {}) {
  try {
    const response = await apiClient.post(endpoint, data, options);
    return response.data;
  } catch (error) {
    throw error;
  }
}

/**
 * Make a PUT request to the API
 * @param {string} endpoint - API endpoint
 * @param {object} data - Request body data
 * @param {object} options - Axios options
 * @returns {Promise} Axios response data
 */
export async function put(endpoint, data, options = {}) {
  try {
    const response = await apiClient.put(endpoint, data, options);
    return response.data;
  } catch (error) {
    throw error;
  }
}

/**
 * Make a DELETE request to the API
 * @param {string} endpoint - API endpoint
 * @param {object} options - Axios options
 * @returns {Promise} Axios response data
 */
export async function del(endpoint, options = {}) {
  try {
    const response = await apiClient.delete(endpoint, options);
    return response.data;
  } catch (error) {
    throw error;
  }
}

/**
 * Get the full API URL for an endpoint
 * @param {string} endpoint - API endpoint
 * @returns {string} Full API URL
 */
export function getApiUrl(endpoint) {
  const baseUrl = config.apiDomain;
  const path = endpoint.replace(/^\//, '');
  return `${baseUrl}/${path}`;
}
