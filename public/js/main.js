/**
 * ROYPAGE - Main JavaScript
 * Fonctions communes et utilitaires
 */

const ROYPAGE = {
  // Configuration
  config: {
    apiBase: '/api/',
    timeout: 5000
  },

  // Initialiser l'application
  init: function() {
    console.log('🎮 ROYPAGE initializing...');
    this.setupEventListeners();
    this.loadData();
  },

  // Configurer les écouteurs d'événements
  setupEventListeners: function() {
    // Ajouter les écouteurs d'événements ici
    document.addEventListener('DOMContentLoaded', () => {
      this.ready();
    });
  },

  // Quand le DOM est prêt
  ready: function() {
    console.log('✅ ROYPAGE ready!');
  },

  // Charger les données
  loadData: function() {
    // Charger les données depuis l'API
  },

  // Fetch API wrapper
  fetch: function(endpoint, options = {}) {
    const url = this.config.apiBase + endpoint;
    const defaultOptions = {
      headers: {
        'Content-Type': 'application/json'
      },
      timeout: this.config.timeout
    };

    const fetchOptions = { ...defaultOptions, ...options };

    return fetch(url, fetchOptions)
      .then(response => {
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
      })
      .catch(error => {
        console.error('Fetch error:', error);
        return null;
      });
  },

  // Afficher une notification
  notify: function(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type}`;
    notification.textContent = message;
    document.body.appendChild(notification);

    setTimeout(() => {
      notification.remove();
    }, 5000);
  },

  // Valider un formulaire
  validateForm: function(formId) {
    const form = document.getElementById(formId);
    if (!form) return false;
    return form.checkValidity();
  }
};

// Initialiser au chargement de la page
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', ROYPAGE.init.bind(ROYPAGE));
} else {
  ROYPAGE.init();
}
